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

Route::prefix('v1')->group(function () {
    Route::apiResource('/user', 'Api\v1\UserController')
        ->only(['show', 'destroy', 'update', 'store']);

    Route::apiResource('/user', 'Api\v1\UserController')
        ->only(['index']);
});

Route::prefix('v2')->group(function () {
    Route::apiResource('/user', 'Api\v2\UserController')
        ->only(['show']);
});
