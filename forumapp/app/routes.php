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

/*Route::get('/',['as'=>'home','uses'=>'QuestionsController@index']);
Route::get('register',['as'=>'register','uses'=>'UsersController@newUser']);
Route::post('register',['uses'=>'UsersController@createUser']);*/
Route::resource('questions','QuestionsController');
Route::get('/',['as'=>'home','uses'=>'QuestionsController@index']);
Route::get('your-questions',['as'=>'your_questions','uses'=>'QuestionsController@yourQuestions']);
Route::resource('users','UsersController');
Route::get('login',['as'=>'login', 'uses'=>'UsersController@getLogin']);
Route::get('logout',['as'=>'logout', 'uses'=>'UsersController@getLogout']);

Route::post('login','UsersController@postLogin');

Route::resource('answers','AnswersController');


