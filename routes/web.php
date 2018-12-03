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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//Hamza routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('post')->group(function () {
        Route::view('new', 'new')->name('new.post');
        Route::post('save', 'PostController@save')->name('post.save');
        Route::get('details/{id}', 'PostController@show')->name('details');
        Route::get('search', 'PostController@search')->name('search');
        Route::post('details/comment', 'PostController@comment')->name('post.comment');
        Route::post('like', 'PostController@like')->name('post.like');
    });
});

//Pascal routes
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/dbtest', function () {

    $posts = \App\Post::all();
    return view('dbTest', compact('posts'));
})->name('dbtest');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');