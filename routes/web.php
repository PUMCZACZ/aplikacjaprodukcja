<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth',
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::prefix('/logout')
        ->name('guests.')
        ->group(function () {
            Route::post('/logout', [UserController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/admin')
        ->name('admins.')
        ->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::post('/', [AdminController::class, 'store'])->name('store');
        });

    Route::prefix('/client')
        ->name('clients.')
        ->group(function () {
            Route::get('/', [ClientController::class, 'index'])->name('index');
            Route::get('/create', [ClientController::class, 'create'])->name('create');
            Route::post('/', [ClientController::class, 'store'])->name('store');
            Route::get('/{client}', [ClientController::class, 'edit'])->name('edit');
            Route::post('/{client}', [ClientController::class, 'update'])->name('update');
            Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
            Route::get('/show/{client}', [ClientController::class, 'show'])->name('show');
        });

    Route::prefix('/transport')
        ->name('transports.')
        ->group(function () {
            Route::get('/', [TransportController::class, 'index'])->name('index');
            Route::get('/create', [TransportController::class, 'create'])->name('create');
            Route::post('/', [TransportController::class, 'store'])->name('store');
            Route::get('/{transport}', [TransportController::class, 'edit'])->name('edit');
            Route::post('/{transport}', [TransportController::class, 'update'])->name('update');
            Route::delete('/{transport}', [TransportController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/order')
        ->name('orders.')
        ->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/', [OrderController::class, 'store'])->name('store');
            Route::get('/{order}', [OrderController::class, 'edit'])->name('edit');
            Route::get('/{order}/confirm', [OrderController::class, 'confirm'])->name('confirm');
            Route::post('/{order}', [OrderController::class, 'update'])->name('update');
            Route::delete('/{order}', [OrderController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/company')
        ->name('companies.')
        ->group(function () {
            Route::get('/', [CompanyController::class, 'index'])->name('index');
            Route::get('/create', [CompanyController::class, 'create'])->name('create');
            Route::post('/', [CompanyController::class, 'store'])->name('store');
            Route::get('/{company}', [CompanyController::class, 'edit'])->name('edit');
            Route::post('/{company}', [CompanyController::class, 'update'])->name('update');
            Route::delete('/{company}', [CompanyController::class, 'destroy'])->name('destroy');
        });
});

Route::middleware('guest')->group(function () {
    Route::prefix('/login')
        ->name('guests.')
        ->group(function () {
            Route::get('/', [UserController::class, 'create'])->name('index');
            Route::post('/', [UserController::class, 'store'])->name('store');
        });
});

Route::get('/test', function () {

    flash('Jakaś informacja', 'error');

    return redirect(route('home'));
});
