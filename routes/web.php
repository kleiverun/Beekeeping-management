<?php

use App\Http\Controllers\view\ApiaryController;
use App\Http\Controllers\view\DashboardController;
use App\Http\Controllers\view\HarvestController;
use App\Http\Controllers\view\NewHiveController;
use App\Http\Controllers\view\QueenController;
use App\Models\Apiary;
use App\Models\Hive;
use App\Models\Queen;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route to the page where you can register a new apiary
    Route::get('/newApiary', function () {
        return view('newapiary');
    })->name('newApiary');
    // Route to the page where you can register a new hive
    Route::get('/newHive',[NewHiveController::class, 'index'])->name('newHive');
    // Route to the page where you see and register new harvests
   Route::get('/newHarvest', [HarvestController::class, 'index'])->name('newHarvest');
    // Route to the page where you can see all the apiaries you have registered
    Route::get('/apiaries', [ApiaryController::class, 'index'])->name('apiaries');
    // Route to the page where you can register a new queen
    Route::get('/newQueen', [QueenController::class, 'index'])->name('newQueen');
    Route::get('/newInspection', function () {
        $hives = Hive::where('user_id', auth()->id())->get();
        return view('newinspection')->with('hives', $hives);
    })->name('newInspection');
    // Routes to store new apiary, hive and queen
    Route::post('/registerApiary', 'App\Http\Controllers\form\v1\ApiaryController@store')->name('ApiaryController.store');
    Route::post('/registerHive', 'App\Http\Controllers\form\v1\NewHiveController@store')->name('NewHiveController.store');
    Route::post('/registerQueen', 'App\Http\Controllers\form\v1\NewQueenController@store')->name('NewQueenController.store');
    Route::post('/registerInspection', 'App\Http\Controllers\form\v1\InspectionController@store')->name('InspectionController.store');
    // Get all hives for this {id} apiary
    Route::get('/hives/{id}', 'App\Http\Controllers\view\HiveController@index')->name('hive.index');
});
