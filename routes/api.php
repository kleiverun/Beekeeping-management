<?php

use App\Http\Controllers\api\v1\ApiaryController;
use App\Http\Controllers\api\v1\HiveController;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/v1/brukere middleware auth:sanctum er feilen
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\api\v1', 'middleware' => 'auth:sanctum'], function () {
    // Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\api\v1'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('apiaries', ApiaryController::class);
    Route::apiResource('hives', HiveController::class);
    Route::post('apiaries/bulk', ['uses' => 'ApiaryController@bulkStore']);
});
// https://laravel.com/docs/10.x/sanctum
