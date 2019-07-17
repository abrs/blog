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

#Pages
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'PagesController@SendContact');

#Guest's Blog
Route::get('blog', 'BlogController@getIndex')->name('blog.index');
Route::get('blog/{slug}', 'BlogController@getSingle')->name('blog.single')->where('slug', '[\w\d\-\_]+');

#Comments
Route::post('blog/{post}/comments', 'CommentController@store')->name('comments.store');
Route::resource('comments', 'CommentController')->except(['store', 'create', 'index', 'show'])->middleware('auth');

#Posts
Route::resource('posts', 'PostController')->middleware('auth');

#tags
Route::resource('tags', 'TagController')->middleware('auth')->except(['create', 'edit'])->middleware('auth');

#User Default Authentication System.
Auth::routes();

#Categories
Route::resource('categories', 'CategoryContoller')->except(['create', 'show', 'edit'])->middleware('auth');
