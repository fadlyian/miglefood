<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\TransactionReportController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredProductController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\AuthenticatedSessionCustomerController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\DashboardController;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //     ->name('password.request');

    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    //     ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //     ->name('password.reset');

    // Route::post('reset-password', [NewPasswordController::class, 'store'])
    //     ->name('password.store');
});

// Route::middleware('customer')->group(function () {
//     Route::get('login-customer', [AuthenticatedSessionCustomerController::class, 'create'])
//                 ->name('login-customer');

//     Route::post('login-customer', [AuthenticatedSessionCustomerController::class, 'store']);
// });

Route::middleware('auth')->group(function () {

    Route::get('/dashboard-order-list', function(){
        return view('dashboard.sales-management.order-list');
    })->name('dashboard-order-list');

    Route::get('/dashboard-payment', function(){
        return view('dashboard.sales-management.payment');
    })->name('dashboard-payment');

    Route::get('/dashboard-transaction-history', function(){
        return view('dashboard.sales-management.transaction-history');
    })->name('dashboard-transaction-history');

    Route::get('/dashboard-transaction-report', function(){
        return view('dashboard.sales-management.transaction-report');
    })->name('dashboard-transaction-report');

    Route::get('/transaction-report/pdf', [TransactionReportController::class, 'generatePDF'])->name('transaction.pdf');

    Route::middleware('roles:chef')->group(function(){
        Route::get('/dashboard-chef', function(){
            return view('dashboard.chef.dashboard');
        })->name('dashboard-chef');
    });

    Route::middleware('roles:cashier')->group(function(){
        Route::get('/dashboard-cashier', [DashboardController::class, 'homeCashier'])->name('dashboard-cashier');
    });

    Route::middleware('roles:admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'homeAdmin'])->name('dashboard');

        // profile
        Route::get('/add-account', [RegisteredUserController::class, 'create'])->name('add-account');
        Route::post('/add-account', [RegisteredUserController::class, 'store'])->name('add-account');
        Route::get('/list-account', [UserController::class, 'index'])->name('list-account');
        Route::get('/edit-account/{id}', [UserController::class, 'edit'])->name('edit-account');
        Route::put('/update-account/{id}', [UserController::class, 'update'])->name('update-account');
        Route::delete('/delete-account/{id}', [UserController::class, 'destroy'])->name('delete-account');

        //product/menu
        Route::resource('product', ProductController::class);
    });

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // hanya untuk cek tampilan
    // Route::get('/edit-account', function(){
    //     return view('dashboard.account.edit-account');
    // })->name('edit-account');
    // Route::get('/edit-menu', function(){
    //     return view('dashboard.menu.edit-menu');
    // })->name('edit-menu');

});
