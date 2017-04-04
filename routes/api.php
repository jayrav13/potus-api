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

/**
 *	/
 *
 *	Unauthenticated routes.
 */
Route::group(['middleware' => []], function() {

	/**
	 *	/users
	 *
	 *	All User routes.
	 */
	Route::group(['prefix' => 'users'], function() {
		Route::post('/', "UsersController@create");
	});

	/** 
	 *	/heartbeat
	 *
	 *	All health check routes.
	 */
	Route::group(['prefix' => 'heartbeat'], function() {
		Route::get('/', "GenericController@heartbeat");
	});

});

/**
 *	["middleware" => ["auth:api"]]
 *
 *	Authenticated routes.
 */
Route::group(['middleware' => ['auth:api', 'management']], function() {

	/**
	 *	/users
	 *
	 *	All User routes.
	 */
	Route::group(['prefix' => 'users'], function() {
		Route::get('/', "UsersController@get");
	});

	/**
	 *	/presidents
	 *
	 *	All Presidents routes.
	 */
	Route::group(['prefix' => 'presidents'], function() {

		// Return all US presidents.
		Route::get('/', "PresidentsController@index");

		// Routes for a specific US president.
		Route::group(['prefix' => '{number}'], function() {

			// Return a specific US president.
			Route::get("/", "PresidentsController@get");

			// Return a specific US president's cabinet.
			Route::group(['prefix' => 'cabinet'], function() {
				Route::get("/", "CabinetMembersController@presidents");
			});

		});

	});

	/**
	 *	/vice_presidents
	 *
	 *	All Vice Presidents routes.
	 */
	Route::group(['prefix' => 'vice_presidents'], function() {

		// Return all US vice presidents.
		Route::get('/', "VicePresidentsController@index");

		// Return a specific US vice president.
		Route::group(['prefix' => '{number}'], function() {
			Route::get('/', "VicePresidentsController@get");
		});

	});

	/**
	 *	/polls
	 *
	 *	Al President poll data.
	 */
	Route::group(['prefix' => 'polls'], function() {

		// Get all polls.
		Route::get('/', "PollsController@index");

	});

});

