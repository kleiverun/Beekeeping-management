<?php

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
    return view('frontend.layouts.frontpage');
});

Route::get('/NyKube', function () {
    return view('frontend.layouts.nykube');
});
Route::get('/NyBigård', function () {
    return view('frontend.layouts.nyBigård');
});

