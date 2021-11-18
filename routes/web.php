<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/signin',[AuthController::class,'signin'])->name('signin');
Route::post('/signup',[AuthController::class,'signup'])->name('signup');

