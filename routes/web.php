<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\User3Controller;

require __DIR__ . '/auth.php';

Route::get('/', [IssueController::class, 'redirect']);

// User
Route::get('/dashboard', [User3Controller::class, 'index'])->name('user.dashboard');
Route::get('/users/tickets/{id}', [User3Controller::class, 'show'])->name('user.tickets');
Route::post('/users/tickets', [User3Controller::class, 'store'])->name('user.tickets.store');
Route::put('/users/tickets/{id}/edit', [User3Controller::class, 'close'])->name('user.tickets.close');

// Admin 
Route::get('/admin/dashboard', [UserController::class, 'show'])->middleware(['auth', 'isAdmin:admin,agent'])->name('admin.dashboard');

// Tickets Management ( Admin | Agent )
Route::prefix('/tickets')->middleware(['auth', 'isAdmin:admin'])->group(function () {
    Route::get('', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/create', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::put('/{id}/edit', [TicketController::class, 'update'])->name('tickets.update');
});
// User Management ( Admin )
Route::prefix('/admin/users')->middleware(['auth', 'isAdmin:admin'])->group(function () {
    Route::get('', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('create', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('{id}/edit', [UserController::class, 'update'])->name('admin.users.update');
});
