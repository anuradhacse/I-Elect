<?php

use App\Http\Kernel;

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
    return view('theme.home');
});


Route::get('/foo', function () {
    return view('test');
});
Route::get('/home', function () {
    return view('theme.home');
});


Route::auth();

Route::get('/adminhome', 'HomeController@adminHome')->middleware('admin_privilage');
Route::get('/voterhome', 'VoterController@voterHome');

//creating routes for elections-->show,edit,update and delete

Route::get('elections', 'ElectionController@index');
Route::get('elections/create', 'ElectionController@create');
Route::post('elections', 'ElectionController@store');
Route::get('elections/{id}/show', 'ElectionController@show');
Route::get('elections/{id}/vote', 'ElectionController@vote');
Route::get('elections/{id}/edit', 'ElectionController@edit');
Route::get('elections/{id}/finalize', 'ElectionController@finalize');
Route::get('elections/{id}/results', 'ElectionController@results');
Route::patch('elections/{id}', 'ElectionController@update');
Route::delete('elections/{id}/delete', 'ElectionController@delete');


//voter routes

Route::get('voters/{id}/create', 'VoterController@create');
Route::post('voters', 'VoterController@store');
Route::post('voters/vote', 'VoterController@vote');
Route::delete('voters/{id}/delete', 'VoterController@delete');

//candidate routes

Route::get('candidates/{id}/create', 'CandidateController@create');
Route::get('candidate/{id}/show', 'CandidateController@show');
Route::post('candidates', 'CandidateController@store');
Route::delete('candidates/{id}/delete', 'CandidateController@delete');



