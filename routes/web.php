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
    return view('login');
});
Route::post('/login', ['as'=>'login', 'uses' =>'UserController@login']);
Route::post('/registration', ['as'=>'registration', 'uses' =>'UserController@registration']);
Route::post('/newTicket', ['as'=>'newTicket', 'uses' =>'UserController@newTicket']);
Route::post('/addComment', ['as'=>'addComment', 'uses' =>'UserController@addComment']);
Route::get('/dashboard', ['as'=>'dashboard', 'uses' =>'UserController@dashboard']);
Route::get('/createTicket', ['as'=>'createTicket', 'uses' =>'UserController@createTicket']);
Route::get('/inbox', ['as'=>'inbox', 'uses' =>'UserController@inbox']);
//Route::get('/logOut', ['as'=>'logOut', 'uses' =>'UserController@logOut']);
