<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\ShortUserController;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[ShortUserController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/links',[ShortUserController::class, 'index'])->name('user.links')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/short',[ShortUrlController::class, 'short'])->name('short.url');
Route::get('/{code}',[ShortUrlController::class, 'show'])->name('short.show');


