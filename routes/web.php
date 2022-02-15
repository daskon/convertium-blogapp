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

Route::get('/','HomeController@welcome');

Route::get('home','HomeController@index');
Route::get('viewblog','HomeController@viewBlogPost');

Route::resource('editor','EditorController');
Route::resource('blog','BlogController');
Route::resource('accept','AcceptController');
Route::resource('draft','DraftController');
