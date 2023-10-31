<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/NyKube', function () {
        return view('nykube');
    })->name('NyKube');

    Route::get('/NyBigård', function () {
        return view('nybigård');
    })->name('NyBigård');
});

Route::get('/setup', function () {
    $credentials = [
        'email' => 'Admin44@hotmail.com',
        'password' => 'password',
    ];

    // Attempt to authenticate the admin user
    if (!Auth::attempt($credentials)) {
        // Admin user doesn't exist, create a new one

        $user = new User();
        $user->firstname = 'Admin';
        $user->lastname = 'Admin';
        $user->adress = 'Admin';
        $user->phonenumber = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        // Attempt to authenticate again
        if (Auth::attempt($credentials)) {
            // Admin user is now created or already exists, generate tokens
            $user = Auth::user();
            // Create token with permissions for create, update, delete
            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            // Create token with permissions for create, update
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            // Create a basic token without specific permissions
            $basicToken = $user->createToken('basic-token');

            // Optionally, return the generated tokens or any other response
            return response()->json([
                'adminToken' => $adminToken->plainTextToken,
                'updateToken' => $updateToken->plainTextToken,
                'basicToken' => $basicToken->plainTextToken,
            ]);
        }
    }
});
