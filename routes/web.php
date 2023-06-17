<?php

use App\Http\Controllers\Auth\CustomerAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// link to "domain/" redirect to login for customer
Route::view('/', 'auth.login-customer');

Route::get('/login', [CustomerAuthController::class, 'loginForm'])->name('consumer.login');
Route::post('/login', [CustomerAuthController::class, 'login'])->name('consumer.login.submit');

Route::view('/home',function(){
    echo "hallo dek";
})->name('home');

require __DIR__.'/auth.php';
