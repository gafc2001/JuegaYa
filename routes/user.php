<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;

Route::get('',[UserController::class,'index'])->name('index');
Route::get('/home',[UserController::class,'home'])->name('home');


Route::resource('/match',MatchController::class);
Route::put('/match/{match}/status',[MatchController::class,'status'])->name('match.status');

Route::resource('/profile',ProfileController::class);
Route::resource('/quiz',QuizController::class);