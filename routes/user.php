<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MatchController;

Route::get('/home',[UserController::class,'home']);
Route::get('/profile',[UserController::class,'profile']);
Route::get('/quiz',[UserController::class,'quiz']);


Route::resource('/match',MatchController::class);