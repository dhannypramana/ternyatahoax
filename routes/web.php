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
// Page Not Found
Route::get('/404', function () {
    return view('errors.404');
})->name('404');

Route::get('/403', function () {
    return view('errors.403');
})->name('403');

Route::prefix('admin')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->middleware('auth:admins');
        Route::get('/unreviewed', [AdminController::class, 'unreviewed'])->middleware('auth:admins');
        Route::get('/reviewed', [AdminController::class, 'reviewed'])->middleware('auth:admins');

        Route::prefix('manage')->group(function () {
            Route::get('/', [AdminController::class, 'manageAdmins'])->middleware('isSuper');

            Route::get('/add', [AdminController::class, 'addAdmin'])->middleware('isSuper');
            Route::post('/add', [AdminController::class, 'store'])->middleware('isSuper');

            Route::get('/delete/{id}', [AdminController::class, 'deleteAdmin'])->middleware('isSuper');
        });
    });

    Route::get('/login', [AdminController::class, 'login'])->middleware('guest:admins');
    Route::get('/register', [AdminController::class, 'register'])->middleware('guest:admins');
    Route::post('/login', [AdminController::class, 'authenticate']);

    Route::post('/register-admin', [AdminController::class, 'store']);
    Route::post('/logout-admin', [AdminController::class, 'logout']);
});

// User
Route::get('/', [UserController::class, 'home']);
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);