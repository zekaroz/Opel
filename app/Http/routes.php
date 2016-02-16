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

//Route::get('Shops/', 'ShopsController@index');
//
//Route::get('Shops/create', 'ShopsController@create');
//
//Route::get('Shops/{id}', 'ShopsController@show');
//
//Route::post('Shops', 'ShopsController@store');
//
//Route::get('Shops/{id}/edit', 'ShopsController@edit');


/*
 Web site routes
 *  */
Route::get('index', function(){
    return View::make('online_shop.welcome.index');
});

Route::get('quem_somos', function(){
    return View::make('online_shop.about.about');
});

Route::get('mapa', function(){
    return View::make('online_shop.contacts.contacts');
});

Route::get('pecas', function(){
    return View::make('online_shop.partsSearch.partSearch');
});

Route::get('carros', function(){
    return View::make('online_shop.CarsSearch.carSearch');
});

Route::get('servicos', function(){
    return View::make('online_shop.services.services');
});

/*
 Web site End
 *  */


Route::resource('shops','ShopsController');

Route::resource('part_types','PartTypesController');

Route::resource('brands','BrandsController');

Route::resource('article_types','ArticleTypesController');

Route::resource('models','BrandModelsController');

Route::resource('articles','ArticlesController');

//Route::get('/backoffice/users','UsersController');

Route::get('/', 'HomeController@index');

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

Route::get('auth/logout', 'Auth\AuthController@getLogout');
 
 
/*
 * We need basically 2 route, one for adding file entries, 
 * one for download it. We are going to add a third 
 * route to have an index page with a form 
 * and where we will display our files. 
 *  */
Route::get('fileentry', 'FileEntryController@index');

Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);

Route::delete('fileentry/{file_id}', 'FileEntryController@destroy'  );


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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
