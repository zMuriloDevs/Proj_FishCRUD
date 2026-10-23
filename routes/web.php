<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/Fish/create', [FishController::class, 'create'])->name('Fish.create');
Route::get('/Fish', [FishController::class, 'index'])->name('Fish.index');
Route::post('/Fish', [FishController::class, 'store'])->name('Fish.store');
Route::get('/Fish/edit/{Fish}', [FishController::class, 'edit'])->name('Fish.edit');
Route::post('/Fish/update/{Fish}', [FishController::class, 'update'])->name('Fish.update');
Route::delete('/Fish/delete/{Fish}', [FishController::class, 'destroy'])->name('Fish.delete');

Route::get('/Type/create', [TypeController::class, 'create'])->name('Type.create');
Route::get('/Type', [TypeController::class, 'index'])->name('Type.index');
Route::post('/Type', [TypeController::class, 'store'])->name('Type.store');
Route::get('/Type/edit/{Fish}', [TypeController::class, 'edit'])->name('Type.edit');
Route::post('/Type/update/{Fish}', [TypeController::class, 'update'])->name('Type.update');
Route::delete('/Type/delete/{Fish}', [TypeController::class, 'destroy'])->name('Type.delete');