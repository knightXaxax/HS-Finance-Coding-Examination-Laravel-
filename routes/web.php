<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@homepage')->name('homepage');
Route::get('/login_page', 'PagesController@login_page')->name('login_page')->middleware('verifyIsAccountOnline');
Route::get('/registration_page', 'PagesController@registration_page')->name('registration_page')->middleware('verifyIsAccountOnline');
Route::get('/logout', 'PagesController@logout')->name('logout');

Route::post('/login', 'LoginController@store')->name('login');

Route::post('/register', 'RegistrationController@store')->name('register');

Route::get('/profile/{profile_id}', 'ProfileController@show')->name('profile');

Route::get('/post_creator_page', 'PostController@index')->name('post_creator_page');
Route::post('/post', 'PostController@store')->name('post');
Route::get('/post/{post_id}', 'PostController@show')->name('show_post');
Route::get('/post/{post_id}/edit', 'PostController@edit');
Route::post('/post/{post_id}', 'PostController@update')->name('post_update');
Route::delete('/post/{post_id}', 'PostController@destroy')->name('post_delete');
