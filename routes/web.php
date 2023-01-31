<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/',[UserController::class,'show']);
Route::get('/admin/login',[AdminController::class,'show']);
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::get('/admin/managers',[AdminController::class,'managers'])->name('admin.managers');
Route::post('/admin/managers', [AdminController::class,'createManager'])->name('admin.create-manager');
Route::get('/admin/employees',[AdminController::class,'employees'])->name('admin.employees');
Route::post('/admin/employees', [AdminController::class,'createEmployee'])->name('admin.create-employee');
