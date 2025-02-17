<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('home');


Route::get('/dashboard', function () {
    return view('studentPages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tables', function () {
    return view('studentPages.tables');
})->middleware(['auth', 'verified'])->name('tables');

Route::get('/profiles', function () {
    return view('studentPages.profiles');
})->middleware(['auth', 'verified'])->name('profiles');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
