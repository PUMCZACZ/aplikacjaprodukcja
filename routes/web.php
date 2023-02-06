<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('client',[ClientController::class, 'index'])->name('client');

Route::get('client/create',[ClientController::class, 'create'])->name('client/create');
Route::post('/client/compose',[ClientController::class, 'store']);

Route::get('transport', [TransportController::class, 'index'])->name('transport');

Route::get('order', [OrderController::class, 'index'])->name('order');
