<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

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
        
        // Manage Unreviewed Reports
        Route::get('/unreviewed', [ReportController::class, 'unreviewed'])->middleware('auth:admins');
        Route::get('/unreviewed/{report:slug}', [ReportController::class, 'detailUnreviewed'])->middleware('auth:admins');
        Route::post('/unreviewed/{report:slug}/set-fact', [ReportController::class, 'setReviewFact'])->middleware('auth:admins');
        Route::post('/unreviewed/{report:slug}/set-hoax', [ReportController::class, 'setReviewHoax'])->middleware('auth:admins');
        Route::post('/unreviewed/delete/{report:slug}', [ReportController::class, 'deleteUnreviewedReport'])->middleware('auth:admins');

        // Manage Reviewed Reports
        Route::get('/reviewed', [ReportController::class, 'reviewed'])->middleware('auth:admins');
        Route::get('/reviewed/{report:slug}', [ReportController::class, 'detailReviewed'])->middleware('auth:admins');

        // Manage Admins
        Route::prefix('manage')->group(function () {
            Route::get('/', [AdminController::class, 'manageAdmins'])->middleware('isSuper');

            Route::get('/add', [AdminController::class, 'addAdmin'])->middleware('isSuper');
            Route::post('/add', [AdminController::class, 'store'])->middleware('isSuper');

            Route::get('/delete/{id}', [AdminController::class, 'deleteAdmin'])->middleware('isSuper');
        });

        // Manage Users
        Route::prefix('manage-users')->group(function () {
            Route::get('/', [AdminController::class, 'manageUsers'])->middleware('isSuper');
            Route::get('/delete/{id}', [AdminController::class, 'deleteUser'])->middleware('isSuper');
        });
    });

    Route::get('/login', [AdminController::class, 'login'])->middleware('guest:admins');
    Route::get('/register', [AdminController::class, 'register'])->middleware('guest:admins');
    Route::post('/login', [AdminController::class, 'authenticate']);

    Route::post('/register-admin', [AdminController::class, 'store']);
    Route::post('/logout-admin', [AdminController::class, 'logout']);
});

// User Authentication
Route::get('/', [UserController::class, 'home']);
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']); 

Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);
// End of User Authentication

Route::get('/fact', [UserController::class, 'fact']);
Route::get('/hoax', [UserController::class, 'hoax']);

// Manage Reports
Route::get('/lapor', [ReportController::class, 'index'])->middleware('auth');
Route::post('/lapor', [ReportController::class, 'store'])->middleware('auth');