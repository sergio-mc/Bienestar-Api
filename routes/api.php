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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* --------- APPS --------- */
Route::get('/apps', 'AppsController@getApps' );
Route::post('/app', 'AppsController@createApp' );
/* ------------------------ */

/* --------- USERS --------- */
Route::post('/user', 'UserController@createUser' );
Route::post('/user/login', 'UserController@loginUser' );
Route::get('/users/{id}', 'UserController@getUser' );
Route::post('/user/password/reset', 'UserController@sendMail');
/* ------------------------ */

/* --------- CSV --------- */
Route::post('/csv', 'CSVController@parseCSV');
/* ------------------------ */

/* --------- RESTRICTIONS --------- */
Route::post('/restrictions', 'RestrictionsController@createRestriction');
/* ------------------------ */


/* --------- APP USAGES --------- */
Route::get('/appUsage', 'AppUsages@getUsage');
Route::get('/appLocation', 'AppUsages@getLocation');
/* ------------------------ */



