<?php

use App\Http\Controllers\api\v1\BigardController;
use App\Http\Controllers\api\v1\BikubeController;
use App\Http\Controllers\api\v1\BrukerController;
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

// api/v1/brukere
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\api\v1',  'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('brukere', BrukerController::class);
    Route::apiResource('bigårder', BigardController::class);
    Route::apiResource('bikuber', BikubeController::class);
    Route::post('bigarder/bulk', ['uses' => 'BigardController@bulkStore']);
});
