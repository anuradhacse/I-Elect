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
    return view('test');
});
Route::get('/comhome',function(){
    return view('com.commercial');
});

Route::get('/contactspage',function(){
    return view('com.contacts');
});

Route::auth();

Route::get('/adminhome', 'HomeController@adminHome');
Route::get('/voterhome', 'HomeController@voterHome');

//creating routes for elections-->show,edit,update and delete

Route::get('elections','ElectionController@index');
Route::get('elections/create','ElectionController@create');
Route::post('elections','ElectionController@store');
Route::get('elections/{id}/show','ElectionController@show');

//voter routes

Route::get('voters/{id}/create','VoterController@create');
Route::post('voters','VoterController@store');

//candidate routes

Route::get('candidates/create','CandidateController@create');
Route::post('candidates','CandidateController@store');

