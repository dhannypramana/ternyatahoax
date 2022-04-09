<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::prefix('admin')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->middleware('auth:admins');
        
        // Manage Unreviewed Reports
        Route::get('/unreviewed', [ReportController::class, 'unreviewed'])->middleware('auth:admins');
        Route::get('/unreviewed/{report:slug}', [ReportController::class, 'detailUnreviewed'])->middleware('auth:admins');
        Route::post('/unreviewed/{report:slug}/set-fact', [ReportController::class, 'setReviewFact'])->middleware('auth:admins');

        Route::get('/unreviewed/{report:slug}/set-hoax', [ReportController::class, 'setCategoryHoax'])->middleware('auth:admins');
        Route::post('/unreviewed/{report:slug}/set-hoax', [ReportController::class, 'setReviewHoax'])->middleware('auth:admins');

        Route::post('/unreviewed/delete/{report:slug}', [ReportController::class, 'deleteUnreviewedReport'])->middleware('auth:admins');

        // Manage Reviewed Reports
        Route::get('/reviewed', [ReportController::class, 'reviewed'])->middleware('auth:admins');
        Route::get('/reviewed/{report:slug}', [ReportController::class, 'detailReviewed'])->middleware('auth:admins');

        // Manage Category Hpax
        Route::get('/category', [ReportController::class, 'category'])->middleware('auth:admins');

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
            Route::get('/{user:username}', [AdminController::class, 'detailManageUsers'])->middleware('isSuper');
            // Route::get('/delete/{id}', [AdminController::class, 'deleteUser'])->middleware('isSuper');
        });
    });

    // Admin Authentication
    Route::get('/login', [AdminController::class, 'login'])->middleware('guest:admins');
    Route::post('/login', [AdminController::class, 'authenticate'])->middleware('guest:admins');
    Route::get('/register', [AdminController::class, 'register'])->middleware('isSuper');
    Route::post('/register-admin', [AdminController::class, 'store'])->middleware('isSuper');
    Route::post('/logout-admin', [AdminController::class, 'logout'])->middleware('auth:admins');
});

// User Authentication
Route::get('/', [UserController::class, 'home']);
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest'); 
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Manage Reports
Route::get('/lapor', [ReportController::class, 'index']);
Route::post('/lapor', [ReportController::class, 'store']);

// Accessible Non Auth User
Route::get('/fact', [UserController::class, 'fact']);
Route::get('/hoax', [UserController::class, 'hoax']);
Route::get('/blog/{report:slug}', [UserController::class, 'blog']);

// Accessible Auth User
Route::get('/profile/{user:username}', [UserController::class, 'profile'])->middleware('auth');
Route::get('/edit/{user:username}', [UserController::class, 'edit'])->middleware('auth');
Route::post('/edit/{user:username}', [UserController::class, 'edit_profile'])->middleware('auth');
Route::get('/activity-log/{user:username}', [UserController::class, 'activity_log'])->middleware(['auth', 'verified']);