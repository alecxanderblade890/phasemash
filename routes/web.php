<?php

use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RatingController::class, 'index'])->name('vote');
Route::post('/vote', [RatingController::class, 'vote'])->name('submit.vote');
Route::get('/add-user', [RatingController::class, 'create'])->name('add.user');
Route::post('/add-user', [RatingController::class, 'store'])->name('store.user');
Route::get('/leaderboard', [RatingController::class, 'leaderboard'])->name('leaderboard');

