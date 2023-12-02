<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\MoveStudentController;
use App\Http\Controllers\Admin\OldStudentController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\MyAuth;
use Illuminate\Support\Facades\Route;

Route::middleware(MyAuth::class)->group(function () {
    Route::resource('admins', AdminController::class);
    Route::resource('grades', GradeController::class);
    Route::resource('sessions', SessionController::class);
    Route::resource('students', StudentController::class);
    Route::resource('old-students', OldStudentController::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'checkLogin')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/', 'getFormLogin')->name('loginForm');
});
