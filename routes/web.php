<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MakeupProductsController;
use App\Http\Controllers\xmlController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/makeup', function () {
    return view('makeupProducts');
})->middleware(['auth', 'verified'])->name('makeupProducts');

Route::get('/xml', function () {
    return view('xml');
})->middleware(['auth', 'verified'])->name('xml');


Route::post('/saveQuiz', [MakeupProductsController::class, 'saveQuiz'])->name('saveQuiz');

Route::post('/generateXml', [XmlController::class, 'generateXml'])->name('generateXml');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
