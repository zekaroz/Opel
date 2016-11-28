<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
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

        $articles = Article::where('public',1)
                            ->with('pictures')
                            ->orderByRaw("RAND()")
                            ->take(12)
                            ->get();


        $carrousselArticle= Article::where('public',1)
                            ->whereHas('pictures',
                            function($query) {
                              $query->whereNotNull('fileentries.id');
                            })
                            ->orderByRaw("RAND()")
                            ->take(6)
                            ->get();

        return view('online_shop.welcome.index')
                ->with(compact('articles'))
                ->with(compact('carrousselArticle'));
      }


    public function partSearch(){
        $article_type_car = ArticleType::where('code', 'P')->get()->first();

        $articles = Article::all()
                    ->where('article_type_id', $article_type_car->id);


        return view('online_shop.partsSearch.partSearch')
                    ->with(compact('articles'))
                    ->with(compact('article_type_car'));
    }


    public function carSearch(){

        $article_type_car = ArticleType::where('code', 'C')->get()->first();

        $articles = Article::all()
                    ->where('article_type_id', $article_type_car->id);

        return view('online_shop.CarsSearch.carSearch')
                    ->with(compact('articles'))
                    ->with('viewName', $article_type_car);
    }

    public function carPartsSearch(){
        $article_type_car = ArticleType::where('code', 'VP')->get()->first();

        $articles = Article::all()
                    ->where('article_type_id', $article_type_car->id);

        return view('online_shop.CarsSearch.carPartsSearch')
                    ->with(compact('articles'))
                    ->with('viewName', $article_type_car);
    }

    public function showArticle($articleid){

        $article = Article::find($articleid);

        return view('online_shop.Article.item')
                    ->with(compact('article'));
    }

    public function showItem($slug){

      $article = Article::where('slug', $slug)->with('pictures')->first();

      if( empty($article) )
          return view('errors.PageNotFound');

      $articlePictures = $article->pictures()->orderBy('position', 'asc')->get();


      return view('online_shop.Article.item')
                 ->with(compact('article'))
                 ->with(compact('articlePictures'));
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

    public function  sitemap(){
      // use this package for the easy sitemap creation in Laravel 4.*: https://github.com/RoumenDamianoff/laravel4-sitemap
      // then, do something like this for all your dynamic and static content:
      // Place the following code in a route or controller that should return a sitemap
      $sitemap = App::make("sitemap");

      // Add static pages like this:
      $sitemap->add(route('homepage'),          '2016-11-27T12:30:00+02:00', '0.7', 'daily');
      $sitemap->add(route('about'),             '2016-11-27T12:30:00+02:00', '0.3', 'monthly');
      $sitemap->add(route('contacts'),          '2016-11-27T12:30:00+02:00', '0.3', 'monthly');
      $sitemap->add(route('services'),          '2016-11-27T12:30:00+02:00', '0.3', 'monthly');
      $sitemap->add(route('pecas'),             '2016-11-27T12:30:00+02:00', '1.0', 'daily');
      $sitemap->add(route('carros'),            '2016-11-27T12:30:00+02:00', '1.0', 'daily');
      $sitemap->add(route('carros_para_pecas'), '2016-11-27T12:30:00+02:00', '1.0', 'daily');

      // Add dynamic pages of the site like this (using an example of this very site):
      $articles = Article::all();

      foreach($articles as $item) {
        $sitemap_item_images = [];

        foreach( $item->pictures()->get() as $image ){
          $sitemap_item_images = array_prepend($sitemap_item_images,
                                            [
                                             'url'=> route('article_image',['imageid' => $image->id]),
                                             'title' =>  $item->name
                                           ]
                                          );
        }
        $sitemap->add(route('itemDisplayWithSlug', ['slug' => $item->slug]), $item->updated_at, '0.9', 'daily', $sitemap_item_images);
      }
      // Now, output the sitemap:
      return $sitemap->render('xml');
    }
}
