<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\MyAuth;
use Illuminate\Support\Facades\Route;

Route::middleware(MyAuth::class)->group(function () {
    Route::resource('admins', AdminController::class);
    Route::resource('grades', GradeController::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'checkLogin')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/', 'getFormLogin')->name('loginForm');
});
