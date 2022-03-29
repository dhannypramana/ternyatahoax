<?php

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use lluminate\Database\Eloquent\Collection;

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

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth:admins');
    Route::get('/login', [AdminController::class, 'login'])->middleware('guest:admins');
    Route::get('/register', [AdminController::class, 'register'])->middleware('guest:admins');
    
    Route::post('/register', [AdminController::class, 'store']);
    Route::post('/login', [AdminController::class, 'authenticate']);
    Route::post('/logout', [AdminController::class, 'logout']);
});

// User
Route::get('/home', [UserController::class, 'home'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);