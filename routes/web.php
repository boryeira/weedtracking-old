<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test/{plant_id}', 'TestController@faseCalc');
Route::get('allPhaseCalc/', 'TestController@allPhaseCalc');



Auth::routes();

Route::get('/', 'HomeController@home')->name('home');
Route::get('/us', 'HomeController@us');


//feed
Route::group(['prefix' => 'feed','middleware' => 'auth'], function()
{
	Route::get('/{feed_id}/edit', 'FeedController@edit');

	Route::post('/text-update', 'FeedController@textUpdate');
	Route::post('/image-add', 'FeedController@imageAdd');
	Route::post('/image-delete', 'FeedController@imageDelete');
	Route::post('/delete', 'FeedController@delete');
	Route::post('/create', 'FeedController@create');
	Route::post('/comment', 'FeedController@comment');

});

//plant
Route::group(['prefix' => 'plant'], function()
{
			
	Route::get('/{plantId}', 'PlantController@show');
	Route::get('/{plantId}/images', 'PlantController@images');

	Route::group(['middleware' => 'auth'], function()
	{
		Route::get('/{plantId}/edit', 'PlantController@editView');

		Route::post('/create', 'PlantController@store');
		Route::post('/edit', 'PlantController@edit');
		Route::post('/phase-change', 'PlantController@phaseChange');
		Route::post('/harvest', 'PlantController@harvest');

	});	
});

//user
	Route::group(['prefix' => 'user'], function()
	{
		Route::get('/invitation', 'UserController@invitation');		
		Route::get('/{userId}', 'UserController@show');
		Route::get('/{userId}/plants', 'UserController@plants');
		Route::get('/{userId}/password/default', 'UserController@passwordDefault');

		Route::post('/invite', 'UserController@mailInvitation');
		Route::post('/update', 'UserController@config');

	});


	Route::group(['prefix' => 'strain'], function()
	{	
		Route::get('/', 'StrainController@index');	
		Route::get('/{strain_id}', 'StrainController@show');
		Route::get('/{strain_id}/plants', 'StrainController@plants');

		//ASIGNAR VARIEDAD A PLANTA
		Route::post('/getcr', 'StrainController@getCR');
		Route::post('/getdb', 'StrainController@getDB');
		Route::post('/assign-plant', 'StrainController@assignPlant');		
	});


