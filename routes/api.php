<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => []], function() {

	Route::group(['prefix' => 'users'], function() {

		Route::post('/', "UsersController@create");

	});

});

Route::group(['middleware' => ['auth:api']], function() {

	Route::group(['prefix' => 'users'], function() {

		Route::get('/', "UsersController@get");

	});

	Route::group(['prefix' => 'presidents'], function() {

		Route::get('/', "PresidentsController@index");

	});

});

