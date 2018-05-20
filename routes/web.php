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
Route::get('/users','ApplicationUserController@index');
Route::get('/users/login','ApplicationUserController@loginGet');
Route::post('/users/login','ApplicationUserController@login');

Route::get('/reservations','ReservationController@index');

Route::get('/users/create','ApplicationUserController@create');
Route::get('/reservations/create','ReservationController@create');

Route::get('/users/edit/{id}','ApplicationUserController@edit');
Route::get('/reservations/edit/{id}','ReservationController@edit');

Route::post('/users/update/{id}','ApplicationUserController@update');
Route::post('/reservations/update/{id}','ReservationController@update');

Route::get('/reservations/delete/{id}','ReservationController@destroy');