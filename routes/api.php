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


Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {

    Route::resource('users', 'UserController', ['only' => ['index','show']]);
    Route::resource('boards', 'BoardController', ['only' => ['index','show']]);
    Route::resource('issues', 'IssueController');
    Route::resource('stages', 'StageController');


});
