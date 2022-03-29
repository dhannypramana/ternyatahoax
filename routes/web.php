<?php

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', [BlogController::class, 'allPost']);
Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->middleware('auth');
});

Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);