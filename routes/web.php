<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin/create');
Route::post('/admin/create', [AdminController::class, 'store']);

Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::get('/client/create', [ClientController::class, 'create'])->name('client/create');
Route::post('/client/compose', [ClientController::class, 'store']);
Route::get('/client/{client:id}/edit', [ClientController::class, 'edit']);
Route::patch('/client/edit/{client:id}', [ClientController::class, 'update']);
Route::delete('/client/delete/{client:id}', [ClientController::class, 'destroy']);
Route::get('/client/show/{client:id}', [ClientController::class, 'show']);

Route::get('/transport', [TransportController::class, 'index'])->name('transport');

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order/create', [OrderController::class, 'create'])->name('order/create');
Route::post('/order/create', [OrderController::class, 'store']);
Route::get('/order/{order:id}/edit', [OrderController::class, 'edit']);
Route::patch('/order/edit/{order:id}', [OrderController::class, 'update']);
Route::delete('/order/delete/{order:id}', [OrderController::class, 'destroy']);
