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

Route::group(['prefix' => 'blogs'], function (){
    Route::get('/', 'BlogController@index')->name('index');
    Route::get('/create/', 'BlogController@create')->name('create');
    Route::post('/create', 'BlogController@store')->name('store');
    Route::get('/{blogId}/delete', 'BlogController@delete')->name('delete');
    Route::post('/{blogId}/delete', 'BlogController@destroy')->name('destroy');
    Route::get('/{blogId}/edit', 'BlogController@edit')->name('edit');
    Route::post('/{blogId}/edit', 'BlogController@update')->name('update');
});