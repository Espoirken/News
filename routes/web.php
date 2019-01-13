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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('news', 'NewsController');

Route::get('/news/delete/{id}', [
    'uses' => 'NewsController@destroy',
    'as' => 'news.delete',
]);

Route::resource('categories', 'CategoryController');

Route::get('/categories/delete/{id}', [
    'uses' => 'CategoryController@destroy',
    'as' => 'categories.delete',
]);

Route::any('/dates', [
    'uses' => 'NewsController@date',
    'as' => 'news.dates',
]);

Route::any('/news/results', [
    'uses' => 'NewsController@result',
    'as' => 'news.results',
]);