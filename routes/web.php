<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;


Route::get('/image/{path}',[ImageController::class,'show'])->name('image');
Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
Route::post('/signin',[AuthController::class,'signin'])->name('signin')->middleware('guest');
Route::post('/signup',[AuthController::class,'signup'])->name('signup')->middleware('guest');

