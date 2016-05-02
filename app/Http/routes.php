<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/foo',function(){
    return view('elections.datatable');
});
Route::get('/boo',function(){
    return view('com.commercial');
});

Route::auth();

Route::get('/adminhome', 'HomeController@adminHome');
Route::get('/voterhome', 'HomeController@voterHome');

//creating routes for elections-->show,edit,update and delete

Route::get('elections','ElectionController@index');

