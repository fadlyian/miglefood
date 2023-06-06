<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| init
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/add-account', function () {
    return view('add-account');
})->middleware(['auth', 'verified'])->name('add-account');

Route::get('/add-menu', function () {
    return view('add-menu');
})->middleware(['auth', 'verified'])->name('add-menu');

Route::get('/change-menu', function () {
    return view('change-menu');
})->middleware(['auth', 'verified'])->name('change-menu');

Route::get('/list-account', function () {
    return view('list-account');
})->middleware(['auth', 'verified'])->name('list-account');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
