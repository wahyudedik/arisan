<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;

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
    // route default
    Route::get('/home', [AdminController::class, 'index'])->name('index');
    // route superadmin
    Route::get('/superadmin', [AdminController::class, 'index'])->name('superadmin')->middleware('userAkses:superadmin');
    // route admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('userAkses:admin');
    // route member
    Route::get('/member', [AdminController::class, 'index'])->name('member')->middleware('userAkses:member');
    Route::get('/profile', [MemberController::class, 'profile'])->name('member.profile')->middleware('userAkses:member');
    Route::put('/profile/{member}', [MemberController::class, 'update'])->name('member.update')->middleware('userAkses:member');
    Route::put('/member/{id}', [MemberController::class, 'updateProfile'])->name('member.updateProfile')->middleware('userAkses:member');

    // route logout
    Route::get('/logout', [SesiController::class, 'logout']);
});
