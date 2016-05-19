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
Route::get('/home',function(){
    return view('theme.home');
});

Route::get('/contactspage',function(){
    return view('com.contacts');
});

Route::auth();

Route::get('/adminhome', 'HomeController@adminHome');
Route::get('/voterhome', 'VoterController@voterHome');

//creating routes for elections-->show,edit,update and delete

Route::get('elections','ElectionController@index');
Route::get('elections/create','ElectionController@create');
Route::post('elections','ElectionController@store');
Route::get('elections/{id}/show','ElectionController@show');
Route::get('elections/{id}/vote','ElectionController@vote');
Route::get('elections/{id}/edit','ElectionController@edit');
Route::patch('elections/{id}','ElectionController@update');
Route::delete('elections/{id}/delete','ElectionController@delete');

//voter routes

Route::get('voters/{id}/create','VoterController@create');
Route::post('voters','VoterController@store');
Route::post('voters/vote','VoterController@vote');

//candidate routes

Route::get('candidates/{id}/create','CandidateController@create');
Route::get('candidate/{id}/show','CandidateController@show');
Route::post('candidates','CandidateController@store');

Route::get('test',function(){
    Mail::send('auth.emails.test', [], function ($m) {
        $m->from('me@ielect.com', 'i-Elect Application -Selected for voting');
        $m->to("kasunedward48@gmail.com","Anuradha")->subject('Your Reminder!');
    });
    return "Success";
});

