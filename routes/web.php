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
    });
});

Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);

Route::post('/register', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'store']);