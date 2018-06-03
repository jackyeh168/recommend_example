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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hotel_list', 'WebController@getHotelList');
Route::get('/hotel', 'WebController@getHotel');
Route::get('/landscape', 'WebController@getLandscape');
Route::get('/relation', 'WebController@getRelation');
Route::get('/recommend', 'WebController@getRecommend');
Route::get('/comment', 'WebController@getComment');
Route::get('/logout', 'WebController@logout');

Route::group(['prefix' => 'data'], function () {
    Route::get('allHotels', 'ContentController@getAllHotels');
    Route::get('hotel', 'ContentController@getHotel');
    Route::get('getEvaluation', 'ContentController@getEvaluation');
    Route::get('getHotels', 'ContentController@getHotels');
    Route::post('postEvaluation', 'ContentController@postEvaluation');
});
