<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $isLoggedIn = Auth::check();
    return view('home', compact('isLoggedIn'));
});

Route::get('/dashboard', function () {
    $isLoggedIn = Auth::check();
    return view('home', compact('isLoggedIn'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('medicines', MedicineController::class);
    Route::post('/medicines/{id}/increase', [MedicineController::class, 'increaseStock'])->name('medicines.increase');
    Route::post('/medicines/{id}/decrease', [MedicineController::class, 'decreaseStock'])->name('medicines.decrease');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

require __DIR__ . '/auth.php';
