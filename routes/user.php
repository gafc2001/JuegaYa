<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;

Route::get('',[UserController::class,'index'])->name('index');
Route::get('/home',[UserController::class,'home'])->name('home');
Route::get('/profile',[UserController::class,'profile'])->name('profile');
Route::get('/quiz',[UserController::class,'quiz'])->name('quiz');


Route::resource('/match',MatchController::class);
Route::put('/match/{match}/status',[MatchController::class,'status'])->name('match.status');

Route::resource('/profile',ProfileController::class);