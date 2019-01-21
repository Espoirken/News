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


Route::group(['middleware' => ['web']], function () {
    
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

Route::any('/search/news', [
    'uses' => 'NewsController@search',
    'as' => 'search.news',
]);

});

Route::get('/newsletter', [
    'uses' => 'NewsletterController@create',
    'as' => 'newsletter',
]);

Route::post('/newsletter', [
    'uses' => 'NewsletterController@store',
    'as' => 'newsletter.store',
]);

Route::get('/send/email', [
    'uses' => 'HomeController@mail',
    'as' => 'send.mail',
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
