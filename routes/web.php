<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;

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
});

Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');

Route::resource('medicines', MedicineController::class)->middleware('auth');
Route::post('/medicines/{id}/increase', [MedicineController::class, 'increaseStock'])->name('medicines.increase');
Route::post('/medicines/{id}/decrease', [MedicineController::class, 'decreaseStock'])->name('medicines.decrease');
Route::get('/medicines/{id}/edit', [App\Http\Controllers\MedicineController::class, 'edit'])->name('medicines.edit');
Route::put('/medicines/{id}', [App\Http\Controllers\MedicineController::class, 'update'])->name('medicines.update');

require __DIR__.'/auth.php';
