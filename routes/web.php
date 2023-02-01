<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/',[UserController::class,'show']);
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/home',[UserController::class,'home']);
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/managers',[UserController::class,'managers'])->name('managers');
Route::post('/managers', [UserController::class,'createManager'])->name('create-manager');
Route::get('/employees',[UserController::class,'employees'])->name('employees');
Route::post('/employees', [UserController::class,'createEmployee'])->name('create-employee');
Route::resource('users', UserController::class);
Route::post('/create-holiday-request', [UserController::class,'createHolidayRequest'])->name('create-holiday-request');
Route::get('/holiday-requests',[UserController::class,'holidayRequests'])->name('holiday-requests');
Route::get('/manage-holiday-requests',[UserController::class,'getHolidayRequests'])->name('manage-holiday-requests');
Route::post('manage-holiday-requests',[UserController::class,'approveHoliday'])->name('approve-holiday-requests');
