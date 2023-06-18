<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MembersController;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
    Route::get('/register', [SesiController::class, 'registerForm'])->name('register');
    Route::post('/register', [SesiController::class, 'register'])->name('register.submit');
    // Password reset routes
    Route::get('/forgot-password', [SesiController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [SesiController::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [SesiController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [SesiController::class, 'resetPassword'])->name('password.update');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [AdminController::class, 'index']);
    Route::get('/superadmin', [AdminController::class, 'superadmin'])->middleware('userAkses:superadmin');
    Route::get('/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/members', [MembersController::class, 'approveMember'])->middleware('userAkses:admin');
    Route::get('/member', [AdminController::class, 'member'])->middleware('userAkses:member');
    Route::get('/logout', [SesiController::class, 'logout']);
});
