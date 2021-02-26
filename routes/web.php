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

Auth::routes();

Route::group(['prefix' => "/admin", 'namespace' => "admin"], function () {
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');


    Route::post('/store', 'CategoryController@store')->name('category.store');
    // Route::post('/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');

    Route::put('/update/{id}', 'CategoryController@update')->name('category.update');
});

Route::get('/home', 'HomeController@index')->name('home');