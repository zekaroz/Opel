<?php

namespace App\Http\Controllers;


use Mail;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleType;
use App\ArticleImage;
use App\Brand;
use App\PartType;
use App\BrandModel;
use App\SiteContact;
use App\Http\Requests\ContactFormRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use JsonLd\Context;



use Illuminate\Http\Request;

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

    public function articleSearcher($articleTypeCode, Request $request){
        $modelsList =  BrandModel::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
        $brandsList = Brand::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
        $partsList = PartType::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
        $articleTypeList  = ArticleType::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');

        $searchPage_articleType =  ArticleType::where('code', $articleTypeCode)->first();

        $request->session()->put('lastListRouteURL', route('genericSearch',$searchPage_articleType->code) );
        $request->session()->put('lastListRouteName_label', $searchPage_articleType->name);

       return view('online_shop.partsSearch.ArticleSearcher')
              ->with(compact('modelsList',
                              'brandsList',
                              'partsList',
                              'articleTypeList',
                              'searchPage_articleType'));

    }

    public function globalSearch(Request $request){
      $pagination_limit = 10;

      $searchKeyword = $request->input('keyword');
      $brand_id =  $request->input('brand_id');
      $brand_model_id =  $request->input('brand_model_id');
      $part_type_id =  $request->input('part_type_id');
      $public =  $request->input('public');
      $article_type_id =  $request->input('article_type_id');
      $hideSold = $request->input('hide_sold_ones');

      if($public == 'all'){
          $public = null;
      }

      $codesearchKeyword = str_replace('C', '',str_replace('P', '', $searchKeyword));

       $articles = Article::where(function($q) use ($searchKeyword, $codesearchKeyword){
                                  $q->where('name','like','%'.$searchKeyword.'%' )
                                    ->orWhere('code','like','%'.$codesearchKeyword.'%');
                              })
                ->where(function ($query) use ($brand_id){
                  if($brand_id != '')
                    $query->where('brand_id', $brand_id);
                })
                ->where(function ($query) use ($brand_model_id){
                  if($brand_model_id != '' and  $brand_model_id!= 'all' )
                    $query->where('model_id', $brand_model_id);
                })
                ->where(function ($query) use ($part_type_id){
                  if($part_type_id != '')
                    $query->where('part_type_id', $part_type_id);
                })
                ->where(function ($query) use ($public){
                  if( isset($public))
                    $query->where('public', $public);
                })
                ->where(function ($query) use ($hideSold){
                  // this filed when selected, must filter only the available ones
                  if( $hideSold )
                    $query->where('sold', false);
                })
                ->where(function ($query) use ($article_type_id){
                  if( $article_type_id != '' )
                    $query->where('article_type_id', $article_type_id);
                })
                  ->with('articleType','brand','model','partType')
                  ->orderBy('name', 'asc')->paginate($pagination_limit);

      $outputView = view('online_shop.partsSearch.components.partsSearchResult')
                    ->with(compact('articles','searchPage'))
                    ->render();

      return $outputView;
    }

    public function aboutUs(){
        $context_snippet = Context::create('local_business', [
          'name' => 'PcQar',
          'description' => 'A PcQar dedica-se ao recondicionamento de peças e veículos usados. Prima pela honestidade e pela satisfação dos clientes. Trabalhamos com todos o tipo de marcas, mas somos especialistas nas marcas Alemãs, Japonesas e Norte Americanas.',
          'telephone' => '(+351) 918 619 751',
          'openingHours' => 'mon,tue,,wed,thu,fri',
          'address' => [
              'streetAddress' => 'Rua da Lagoa 31.',
              'addressLocality' => 'Casal Dos Lobos',
              'addressRegion' => 'Leiria, Portual',
              'postalCode' => '2495-016',
          ],
          'geo' => [
              'latitude' => '39.660159',
              'longitude' => '-8.723281',
          ],
      ]);

      return view('online_shop.about.about')
                ->with(compact('context_snippet'));
    }

    public function contacts(){
        $context_snippet = Context::create('local_business', [
          'name' => 'PcQar',
          'description' => 'A PcQar dedica-se ao recondicionamento de peças e veículos usados. Prima pela honestidade e pela satisfação dos clientes. Trabalhamos com todos o tipo de marcas, mas somos especialistas nas marcas Alemãs, Japonesas e Norte Americanas.',
          'telephone' => '(+351) 918 619 751',
          'openingHours' => 'mon,tue,,wed,thu,fri',
          'address' => [
              'streetAddress' => 'Rua da Lagoa 31.',
              'addressLocality' => 'Casal Dos Lobos',
              'addressRegion' => 'Leiria, Portual',
              'postalCode' => '2495-016',
          ],
          'geo' => [
              'latitude' => '39.660159',
              'longitude' => '-8.723281',
          ],
      ]);

      return view('online_shop.contacts.contacts')
                ->with(compact('context_snippet'));
    }

    public function homepage(Request $request){

        $articles = Article::where('public',1)
                            ->where('quantity','>',0)
                            ->with('pictures')
                            ->orderByRaw("RAND()")
                            ->take(12)
                            ->get();


        $carrousselArticle= Article::where('public',1)
                            ->where('quantity','>',0)
                            ->whereHas('pictures',
                            function($query) {
                              $query->whereNotNull('fileentries.id');
                            })
                            ->orderByRaw("RAND()")
                            ->take(6)
                            ->get();

        $request->session()->put('lastListRouteURL', route('homepage'));
        $request->session()->put('lastListRouteName_label', 'Página de Entrada');

        return view('online_shop.welcome.index')
                ->with(compact('articles'))
                ->with(compact('carrousselArticle'));
      }


    public function showArticle($articleid){

        $article = Article::findorFail($articleid);

        return redirect('/item/'.$article->slug);
    }

    public function getArticleThumbnailURL($id){
        $pictures = Article::find($id)
                        ->pictures();

        $pic = Article::find($id)
                        ->pictures()
                        ->orderBy('is_starred', 'desc')
                        ->first();

        if( ! $pic ){
          // when article has no pictures
          $placeholder = str_replace('\\','/', public_path('placeholderThumbnail.jpg'));
          $image = Image::make($placeholder)->stream();
          return (new Response($image, 200))
                        ->header('Content-Type', 'image/jpeg');
        }

        $fileController = new FileEntryController();

        $image = $fileController->getThumbnail($pic->filename);

        return $image;
    }

    public function showItem($slug){

      $article = Article::where('slug', $slug)->with('pictures')->first();

      if( empty($article) )
          return view('errors.PageNotFound');

      $articlePictures = $article->pictures()->orderBy('position', 'asc')->get();

      $lastRouteURL = session('lastListRouteURL');
      $lastRouteLabel = session('lastListRouteName_label');

      return view('online_shop.Article.item')
                 ->with(compact('article'))
                 ->with(compact('articlePictures'))
                 ->with(compact('lastRouteURL'))
                 ->with(compact('lastRouteLabel'));
    }

    public function contactUs(ContactFormRequest $request){
        $info_email = env('PCQAR_Email', 'geral@pcqar.pt');

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

        $email_parameters = [ 'customer_name'       =>  $site_contact_message->name,
                              'customerMessage' => $site_contact_message->message,
                              'contact_number'  =>  $site_contact_message->phone,
                              'customer_email'  =>  $site_contact_message->email,
                              'pcqarEmail'  => $info_email,
                              'subject'     => $site_contact_message->subject
                            ];

      $secondError = '';

      try{
          Mail::queue('online_shop.contactEmail', $email_parameters ,
              function($message) use ($email_parameters){
                  $message->to($email_parameters['pcqarEmail'],$email_parameters['pcqarEmail'])->subject('Mensagem de Cliente em PCQar: '.  $email_parameters['subject']);
              }
          );
        }
        catch(\Exception $e){
              // flash()->info('Erro a enviar mensagem para PCQar.pt, por favor tente mais tarde: ' . $e->getMessage() );
              flash()->success('A sua mensagem foi recebida. Obrigado por nos contactar.');
              return view('online_shop.contacts.contacts');
        }

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
      $sitemap->add(route('pesquisa/P'),          '2017-02-02T12:30:00+02:00', '1.0', 'daily');
      $sitemap->add(route('pesquisa/C'),          '2017-02-02T12:30:00+02:00', '1.0', 'daily');
      $sitemap->add(route('pesquisa/VP'),         '2017-02-02T12:30:00+02:00', '1.0', 'daily');

      // Add dynamic pages of the site like this (using an example of this very site):
      $articles = Article::where('public', 1)->get();

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
        $sitemap->add(route('itemDisplayWithSlug', ['slug' => $item->slug]), $item->updated_at, '1', 'daily', $sitemap_item_images);
      }
      // Now, output the sitemap:
      return $sitemap->render('xml');
    }

    public function fixOrderFromImages(){
        $articles_count = 0;
        $pictures_count = 0;
        foreach(Article::all() as $article){
            if($article->pictures){
              // if aeticle has pictures


              foreach ($article->pictures()->orderBy('position','asc')->get() as $index => $picture) {
                  DB::update('update article_images
                              set position=?
                              where article_id = ?
                                  and fileentry_id = ?
                                ',
                               [
                                $index,
                                $article->id,
                                $picture->id
                              ]);
                   $pictures_count += 1;
              }
              $articles_count +=1;
            }
        }
        return '<div>Success! Order have been fixed!</div> <h3>Articles: '.$articles_count.'</h3><h3>Pictures: '.$pictures_count.'</h3> ';
    }
}
