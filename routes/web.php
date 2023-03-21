<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth',
    ])->group(function () {
    Route::post('/logout', [UserController::class, 'destroy']);

    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/create', [AdminController::class, 'store']);

    Route::get('/client', [ClientController::class, 'index'])->name('client');
    Route::get('/client/create', [ClientController::class, 'create'])->name('client/create');
    Route::post('/client/create', [ClientController::class, 'store']);
    Route::get('/client/{client}/edit', [ClientController::class, 'edit'])->name('test');
    Route::patch('/client/edit/{client}', [ClientController::class, 'update']);
    Route::delete('/client/delete/{client}', [ClientController::class, 'destroy']);
    Route::get('/client/show/{client}', [ClientController::class, 'show']);

    Route::get('/transport', [TransportController::class, 'index'])->name('transport');

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
    Route::get('/login', [UserController::class, 'create'])->name('login');
    Route::post('/login', [UserController::class, 'store']);
});
