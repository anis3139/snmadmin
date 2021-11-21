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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/*Route::namespace('\App\Http\Controllers\Api\V1')->group(function () {
    Route::prefix('v1')->group(function () {
        route::apiResource('user', 'UserController')->except('update');

        route::post('user/{id}','UserController@update');

        route::post('user/update/{user}','UserController@update');


        route::apiResource('partner', 'PartnerController')->except('update');
        route::post('partner/update/{partner}','PartnerController@update');
    });
});*/
