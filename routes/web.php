<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('books/{book}/read', 'BookController@read');
Route::get('books/{book}/download', 'BookController@download');
Route::get('books/{book}/updateDownloads', 'BookController@updateDownloads');
Route::resource('books','BookController',[
	'except' => ['delete','edit']
]);

Route::resource('reviews','BookReviewController',[
	'except' => ['delete','edit']
]);
