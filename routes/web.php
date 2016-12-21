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

Route::get('/home', 'HomeController@index');

// Dashboard Routes for students
Route::get('/jobs', 'JobController@index');
Route::get('/profile', 'ProfileController@index');
Route::get('/applications', 'ApplicationController@index');
Route::get('/messages', 'MessageController@index');
Route::get('/notifications', 'NotificationController@index');
Route::get('/settings', 'SettingsController@index');
