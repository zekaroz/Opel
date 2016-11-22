<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleType;
use App\SiteContact;
use App\Http\Requests\ContactFormRequest;

class OnlineShopController extends Controller
{
    public function __construct() {

   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function homepage(){

        $articles = Article::with('pictures')
                            ->orderByRaw("RAND()")
                            ->take(6)
                            ->get();


        $carrousselArticle= Article::whereHas('pictures',
                            function($query) {
                              $query->whereNotNull('fileentries.id');
                            })
                            ->orderByRaw("RAND()")
                            ->take(5)
                            ->get();

        return view('online_shop.welcome.index')
                ->with(compact('articles'))
                ->with(compact('carrousselArticle'));
      }


    public function partSearch(){
        $article_type_car = ArticleType::where('code', 'P')->get()->first();

        $articles = Article::all()
                    ->where('article_type_id', $article_type_car->id)
                    ->where('public',1) ;

        return view('online_shop.partsSearch.partSearch')
                    ->with(compact('articles'))
                    ->with(compact('article_type_car'));
    }


    public function carSearch(){

        $article_type_car = ArticleType::where('code', 'C')->get()->first();

        $articles = Article::all()
                    ->where('article_type_id', $article_type_car->id)
                    ->where('public',1) ;

        return view('online_shop.CarsSearch.carSearch')
                    ->with(compact('articles'))
                    ->with('viewName', $article_type_car);
    }

    public function carPartsSearch(){
        $article_type_car = ArticleType::where('code', 'VP')->get()->first();

        $articles = Article::all()
                    ->where('article_type_id', $article_type_car->id)
                    ->where('public',1) ;

        return view('online_shop.CarsSearch.carPartsSearch')
                    ->with(compact('articles'))
                    ->with('viewName', $article_type_car);
    }

    public function showArticle($articleid){

        $article = Article::with('pictures')->findOrFail($articleid);

        return view('online_shop.Article.item')
                    ->with(compact('article'));
    }

    public function contactUs(ContactFormRequest $request){
        $info_email = env('RECIOPEL_MAIL', 'zekaroz@gmail.com');

        $site_contact_message = new SiteContact();

        $site_contact_message->email = $request->email;
        $site_contact_message->subject = $request->subject;
        $site_contact_message->name = $request->name;
        $site_contact_message->phone = $request->phone;
        $site_contact_message->message = $request->message;
        $site_contact_message->isSeen= false;

        $site_contact_message->save();

        /* Site no longer send direct emails, but stores the messages as alerts in the backoffice
                $mailer  = new OnlineSiteMailer();

                $mailer->contactUs($info_email, $fullname, $contactNumber, $email, $message);
        */
        flash()->success('O seu contacto foi recebido. Obrigado por nos contactar.');

        return view('online_shop.contacts.contacts');
    }
}
