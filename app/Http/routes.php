<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('about', 'PagesController@about');
Route::get('emails/all', 'EmailsController@all');
Route::resource('emails', 'EmailsController');
Route::get('emails/{id}/preview', 'EmailsController@preview');
Route::resource('templates', 'TemplatesController');
Route::get('templates/{id}/preview', 'TemplatesController@preview');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
