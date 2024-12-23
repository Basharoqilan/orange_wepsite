<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademyController;
use App\Http\Controllers\CohortController;

use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::match(['get', 'post'], '/admin/login', [DashboardController::class, 'admin_login'])->name('admin.login');

Route::match(['get', 'post'], '/admin/forget-password', [DashboardController::class, 'admin_forget_password'])->name('admin.forget-password');

Route::get('/admin/reset-password/{id}', [DashboardController::class, 'admin_reset_password'])->name('admin.reset-password');

Route::post('/admin/update-password', [DashboardController::class, 'admin_update_password'])->name('admin.update-password');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/users/{id}', [UserController::class, 'update'])->name(name: 'user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.delete');

Route::post('/students/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/students/{id}', [StudentController::class, 'update'])->name(name: 'student.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.delete');


Route::post('/academies/store', [AcademyController::class, 'store'])->name('academy.store');
Route::get('/academies/create', [AcademyController::class, 'create'])->name('academy.create');
Route::get('/academies', [AcademyController::class, 'index'])->name('academies');
Route::get('/academies/{id}/edit', [AcademyController::class, 'edit'])->name('academy.edit');
Route::delete('/academies/{id}', [AcademyController::class, 'destroy'])->name('academy.delete');
Route::put('/academies/{academy}', [AcademyController::class, 'update'])->name('academy.update');



Route::post('/Cohorts/store', [CohortController::class, 'store'])->name('cohort.store');
Route::get('/Cohorts/create', [CohortController::class, 'create'])->name('cohort.create');
Route::get('/Cohorts', [CohortController::class, 'index'])->name('cohorts');
Route::get('/Cohorts/{id}/edit', [CohortController::class, 'edit'])->name('cohort.edit');
Route::put('/Cohorts/{id}', [CohortController::class, 'update'])->name('cohort.update');
Route::delete('/Cohorts/{id}', [CohortController::class, 'destroy'])->name('cohort.delete');
