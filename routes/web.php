<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Public Access

Route::get('dashboard', function () {
    return view('welcome');
});

// Register

Route::get('/register', [RegistController::class, 'index'])->name('index');
Route::post('register/action', [RegistController::class, 'register'])->name('register');

// Login

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('auth', [AuthController::class, 'auth'])->name('auth');
