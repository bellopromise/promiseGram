<?php

use App\Mail\NewUserWelcomeMail;
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

Route::get('/email', function() {
    return new NewUserWelcomeMail();
});
Route::post('/follow/{user}', 'FollowsController@store');
Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');

Route::post('/p', 'PostsController@store');
Route::get('/p/{post}',  'PostsController@show');
Route::get('/profile/{user}', 'ProfilesConntroller@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesConntroller@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'ProfilesConntroller@update')->name('profile.update');
