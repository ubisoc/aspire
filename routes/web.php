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
Route::get('/roles/index', 'RoleController@index');
Route::get('/roles/{roleId}/show', 'RoleController@show');

// Profile Routes
Route::get('/profile/index', 'ProfileController@index');
Route::match(['POST', 'GET'], '/profile/edit', 'ProfileController@edit');
Route::get('/profile/delete', 'ProfileController@delete');
Route::post('/profile/upload', 'ProfileController@upload');
Route::get('/profile/download', 'ProfileController@download');

// Application Routes
Route::get('/applications/index', 'ApplicationController@index');
Route::match(['POST', 'GET'], '/applications/{roleId}/create', 'ApplicationController@create');
Route::get('/applications/download/{applicationId}/{fileType}', 'ApplicationController@download');
Route::get('/applications/{applicationId}/show', 'ApplicationController@show');
Route::get('/applications/{applicationId}/delete', 'ApplicationController@delete');

// Notification Routes
Route::get('/notifications/index', 'NotificationController@index');
Route::get('/notifications/{notificationId}/show', 'NotificationController@show');
Route::get('/notifications/{notificationId}/delete', 'NotificationController@delete');

Route::get('/settings', 'SettingsController@index');
