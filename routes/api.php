<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::namespace('\App\Http\Controllers\Api\V1')->group(function () {
    Route::prefix('v1')->group(function () {

        route::apiResource('user', 'UserController')->except('update');
        route::post('user/update/{user}','UserController@update');


        Route::post('login', 'Auth\LoginController@login')->name('user.login');
        Route::post('verify', 'Auth\LoginController@verify')->name('user.verify');

        Route::prefix('user')->middleware('auth:api')->group(function () {
                    Route::get('profile/{id}', function ($id) {
                        return "Hello! I am from Auth";
                    });
        });
    });
});
