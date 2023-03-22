<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth',
])->group(function () {
        Route::prefix('/logout')
            ->name('guests')
            ->group(function () {
                Route::post('/logout', [UserController::class, 'destroy'])->name('destroy');
            });

        Route::get('/', [DashboardController::class, 'index'])->name('home');

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

        Route::prefix('transport')
            ->name('transports.')
            ->group(function () {
                Route::get('/', [ClientController::class, 'index'])->name('index');
                Route::get('/create', [ClientController::class, 'create'])->name('create');
                Route::post('/', [ClientController::class, 'store'])->name('store');
                Route::get('/{client}', [ClientController::class, 'edit'])->name('edit');
                Route::post('/{client}', [ClientController::class, 'update'])->name('update');
                Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
                Route::get('/show/{client}', [ClientController::class, 'show'])->name('show');
            });

        Route::prefix('/order')
            ->name('orders.')
            ->group(function () {
                Route::get('/', [OrderController::class, 'index'])->name('index');
                Route::get('/create', [OrderController::class, 'create'])->name('create');
                Route::post('/', [OrderController::class, 'store'])->name('store');
                Route::get('/{order}', [OrderController::class, 'edit'])->name('edit');
                Route::post('/{order}', [OrderController::class, 'update'])->name('update');
                Route::delete('/{order}', [OrderController::class, 'destroy'])->name('destroy');
            });
    });

Route::middleware('guest')->group(function () {
    Route::prefix('/login')
        ->name('guests')
        ->group(function () {
            Route::get('/', [UserController::class, 'create'])->name('index');
            Route::post('/', [UserController::class, 'store'])->name('store');
        });
});
