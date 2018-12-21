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

Route::view('/', 'client');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getCountriesList','CountryController@index');

Route::get('/getDepartamentsList/{id_country}','DepartamentController@index');

Route::get('/getCitiesList/{id_departament}','CityController@index');
