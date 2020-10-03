<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/post', 'PostController');


Route::get('/search', 'PostController@search');
Route::post('/upload', 'HomeController@profile');
Route::get('/post/create', 'PostController@create')->middleware('check');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/payment', 'PaymentController@payment');
Auth::routes();

Route::get('/payment', 'SubscriptionController@index');
Route::post('/charge', 'SubscriptionController@create')->name('subscription.create');
Route::get('/category', 'Category@index');
Route::post('/category/store', 'Category@store');
Route::delete('/category/{category}', 'Category@destroy')->name('category.destroy');
Route::get('/home', 'HomeController@index')->name('home');
