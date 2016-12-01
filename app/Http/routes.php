<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::post('/article/{articleid}/imagesOrder', 'ArticlesController@saveImageOrder');

Route::get('not_found', ['as'=> 'PageNotFound', function(){
    return View::make('errors.PageNotFound');
}]);

Route::get('/google_info/pcqar/sitemap','OnlineShopController@sitemap');

Route::get('articles/all','ArticlesController@articleSearcher');

Route::post('articles/all','ArticlesController@search');

Route::get('articles/search','ArticlesController@search');

/*Static pages from the online store*/

// the Homepage
Route::get('/',['as' => 'homepage', 'uses' => 'OnlineShopController@homepage'] );

//Contactos
Route::get('contactos',['as' => 'contacts', 'uses'=>'OnlineShopController@contacts']);


// Quem Somos
Route::get('quem_somos',['as' => 'about', 'uses' => 'OnlineShopController@aboutUs']);


// Serviços
Route::get('servicos',['as' => 'services',   function(){
        return View::make('online_shop.services.services');
    }]);

//Pesquisa de Peças
Route::get('/pecas', ['as' => 'pecas', 'uses' => 'OnlineShopController@partSearch']);

//Pesquisa de Automóveis Usados
Route::get('/carros',['as' => 'carros', 'uses' => 'OnlineShopController@carSearch']);

//Pesquisa de Automóveis para Peças
Route::get('/carros_para_pecas', ['as' => 'carros_para_pecas', 'uses' => 'OnlineShopController@carPartsSearch']);

//Article Display Page
Route::get('/item/{articleid}/show',[
    'as' => 'itemDisplay', 'uses' => 'OnlineShopController@showArticle'
] );

Route::get('/item/{slug}',[
    'as' => 'itemDisplayWithSlug', 'uses' => 'OnlineShopController@showItem'
] );

// route to get one of the pictures from the shops
Route::get('/image/{imageid}',['as' => 'article_image', 'uses' => 'FileEntryController@getImage']);

/*
* This is to send emails from the contacts page...
*/
Route::post('contactos/email','OnlineShopController@contactUs');

/*
 Web site End
 *  */


Route::resource('shops','ShopsController');

Route::resource('part_types','PartTypesController');

Route::resource('brands','BrandsController');

Route::get('brands/{brand_id}/loadImages', 'BrandsController@loadImages');

Route::resource('article_types','ArticleTypesController');

Route::resource('models','BrandModelsController');

Route::resource('articles','ArticlesController');

Route::get('articles/{article_id}/loadImages', 'ArticlesController@loadImages');

// the id of the brand goes in the post paylod
Route::post('api/brand/models', [
    'as' => 'getModelsByBrand',
    'uses' => 'ArticlesController@getModelsByBrand'
]);

//Route::get('/backoffice/users','UsersController');

Route::get('backoffice', 'HomeController@index');

Route::post('/readSiteContact/{id}', 'SiteContactController@markAsRead');

Route::get('users', 'UsersController@index');


Route::get('reciopel/', function()
{
	return View::make('home');
});

Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});


Route::get('/documentation', function()
{
	return View::make('documentation');
});

/*
 * We need basically 2 route, one for adding file entries,
 * one for download it. We are going to add a third
 * route to have an index page with a form
 * and where we will display our files.
 *  */
Route::get('fileentry', 'FileEntryController@index');

Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);

Route::get('fileentry/getThumb/{filename}', [
	'as' => 'getThumb', 'uses' => 'FileEntryController@getThumbnail']);

Route::delete('fileentry/{file_id}', 'FileEntryController@destroy'  );

Route::get('/article/thumbnail/{id}', [
    'as' => 'getArticleThumbnailURL',
    'uses' => 'OnlineShopController@getArticleThumbnailURL'
]);

/*
 * This is the route for generic file upload
 */
Route::post('apply/upload', 'FileEntryController@add');

/*
 * brands file upload
 */
Route::post('BrandPictureUpload/{brand_id}', 'BrandsController@addPicture');

Route::delete('BrandPictureUpload/{picture_id}/brand/{brand_id}', 'BrandsController@destroyPicture');

/*
 * Article file upload
 */
Route::post('ArticlePictureUpload/{article_id}', 'ArticlesController@addPicture');

Route::delete('ArticlePictureUpload/{picture_id}/article/{article_id}', 'ArticlesController@destroyPicture');

Route::post('/starImage/{picture_id}/article/{article_id}', 'ArticlesController@starPicture');


Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::post('/ajax_login' , ['as' => 'ajax_login', 'uses' => 'Auth\AuthController@postLogin']);

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('login/facebook', 'Auth\AuthController@redirectToFacebook');

    Route::get('login/facebook/callback', 'Auth\AuthController@getFacebookCallback');

    Route::get('/social/redirect/{provider}', 'Auth\AuthController@getSocialRedirect');
    Route::get('/social/handle/{provider}',   'Auth\AuthController@getSocialHandle');

    Route::get('/home', 'HomeController@index');
});
