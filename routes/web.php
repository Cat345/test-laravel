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

Route::get('/', 'MainController@index');


Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/{id}.html', 'RequestController@request');
Route::get('/admin/form', 'RequestController@create')->name('form.create');
Route::post('/admin/form', 'RequestController@store')->name('form.store');
