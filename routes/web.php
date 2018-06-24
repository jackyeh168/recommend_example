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
Route::get('/Inquire', 'WebController@getInquire');

Route::group(['prefix' => 'data'], function () {
    Route::get('allHotels', 'ContentController@getAllHotels');
    Route::get('hotel', 'ContentController@getHotel');
    Route::get('getEvaluation', 'ContentController@getEvaluation');
    Route::get('getHotels', 'ContentController@getHotels');
    Route::post('postEvaluation', 'ContentController@postEvaluation');
    Route::post('search', 'ContentController@search');
    Route::post('recommend', 'ContentController@recommend');
});

Route::get('test', 'DisController@computeDis');
Route::get('t2', 'DisController@computeTopk');

Route::get('test2', function () {
    $arr = [];
    $q = DB::table('tmp')->get()->toArray();
    for ($i=0; $i < count($q); $i++) { 
        unset($q[$i]->id);
        array_push($arr, json_encode($q[$i]));
    }
    $arr = array_unique($arr);
    // return json_encode($arr);

    foreach ($arr as $k => $v) {
        DB::table('activity')->insert(
            json_decode($v, true)
        );
    }

});

Route::get('test3', function () {
    $arr = [];
    $q = DB::table('hotel')->get()->toArray();
    for ($i=0; $i < count($q); $i++) { 
        $p = ($q[$i]->min_price + $q[$i]->max_price)/2/2000;

        $p = floor($p);
        if ($p > 4){
            $p = 4;
        }

        DB::table('hotel')
        ->where('hotel_id', $q[$i]->hotel_id)
        ->update(
            ['price_interval' => $p]
        );
    }
});