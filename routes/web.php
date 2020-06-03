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

//Using controllers rather than just returning a view.
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/search', 'PostsController@search');

/*Used to create all of my routes in one rather than typing them all out*/
Route::resource('posts', 'PostsController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('locale/{locale}', function($locale){
    session() -> put('locale', $locale);
    return redirect() -> back();
});

Route::get('/sign-in/github', 'Auth\LoginController@github');

Route::get('/sign-in/github/redirect', 'Auth\LoginController@githubRedirect');