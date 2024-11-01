<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return redirect('/login');
});

require __DIR__ . '/auth.php';

Route::get('/dashboard', [IssueController::class, 'index'])->name('dashboard');


// User

// Agent

// Admin
// Tickets Management ( Admin | Agent )
Route::prefix('/tickets')->middleware(['auth'])->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/create', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::put('/{id}/edit', [TicketController::class, 'update'])->name('tickets.update');
});
// User Management ( Admin )
Route::prefix('/admin/users')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('create', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('{id}/edit', [UserController::class, 'update'])->name('admin.users.update');
});


// Route::prefix('tickets')->middleware(['auth'])->group(function () {
//     Route::get('', [TicketController::class, 'index']);

//     Route::get('/create', [TicketController::class, 'create']);

//     Route::post('/create', [TicketController::class, 'store']);

//     Route::get('/{id}', [TicketController::class, 'show']);

//     Route::post('/{id}/assign', [TicketController::class, 'assign']);

//     Route::post('/{id}/resolve', [TicketController::class, 'resolve']);
// });

// Route::prefix('users')->middleware(['auth'])->group(function () {
//     Route::get('', [UserController::class, 'index']);

//     Route::get('/create', [UserController::class, 'show'])->middleware('auth');

//     Route::post('/create', [UserController::class, 'store'])->middleware('auth');

//     Route::get('/{id}/edit', [UserController::class, 'edit'])->middleware('auth');

//     Route::post('/{id}/edit', [UserController::class, 'update'])->middleware('auth');
// });
