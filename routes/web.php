<?php

use App\Http\Controllers\view\ApiaryController;
use App\Http\Controllers\view\DashboardController;
use App\Http\Controllers\view\HarvestController;
use App\Http\Controllers\view\NewHiveController;
use App\Http\Controllers\view\QueenController;
use App\Http\Controllers\view\InspectionController;
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
    Route::view('/newApiary', 'newapiary')->name('newApiary');
    Route::get('/newHive',[NewHiveController::class, 'index'])->name('newHive');
   Route::get('/newHarvest', [HarvestController::class, 'index'])->name('newHarvest');
    Route::get('/apiaries', [ApiaryController::class, 'index'])->name('apiaries');
    Route::get('/newQueen', [QueenController::class, 'index'])->name('newQueen');
    Route::get('/newInspection', [InspectionController::class, 'index'])->name('newInspection');
    Route::post('/registerApiary', [App\Http\Controllers\form\v1\ApiaryController::class,'store'])->name('ApiaryController.store');
    Route::post('/registerHive', [App\Http\Controllers\form\v1\NewHiveController::class,'store'])->name('NewHiveController.store');
    Route::post('/registerQueen', [App\Http\Controllers\form\v1\NewQueenController::class, 'store'])->name('NewQueenController.store');
    Route::post('/registerInspection', [App\Http\Controllers\form\v1\InspectionController::class,'store'])->name('InspectionController.store');
    Route::get('/inspections/{id}', [App\Http\Controllers\view\AllInspectionController::class,'index'])->name('AllInspectionController.index');
    Route::get('/hives/{id}', [App\Http\Controllers\view\HiveController::class,'index'])->name('hive.index');
});
