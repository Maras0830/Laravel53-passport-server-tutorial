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

Route::group(['prefix' => '/user', 'middleware' => 'auth:api'], function (){

    Route::get('/', function (Request $request) {
        return $request->user();
    });

    Route::get('/facebook_information', function (Request $request) {
        return "Hello " . $request->user()->name . " got Facebook information!";
    })->middleware('scope:Facebook_information');


    Route::get('/facebook_github_information', function (Request $request) {
        return "Hello " . $request->user()->name . " got Facebook&GitHub information!";
    })->middleware('scopes:Facebook_information,GitHub_information');


    Route::get('/facebook_twitter_information', function (Request $request) {
        return "Hello " . $request->user()->name . " got Facebook&Twitter information!";
    })->middleware('scopes:Facebook_information,Twitter_information');
});
