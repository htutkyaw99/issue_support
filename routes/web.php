<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return redirect('/login');
    // return view('test');
});

Route::get('/dashboard', [IssueController::class, 'index'])->name('dashboard');

Route::get('/tickets', [TicketController::class, 'index']);

Route::get('/tickets/create', [TicketController::class, 'create'])->middleware('auth');

Route::post('/tickets/create', [TicketController::class, 'store'])->middleware('auth');

Route::get('/tickets/{id}', [TicketController::class, 'show']);

Route::post('/tickets/{id}/assign', [TicketController::class, 'assign'])->middleware('auth');

Route::post('/tickets/{id}/resolve', [TicketController::class, 'resolve'])->middleware('auth');

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/create', [UserController::class, 'show'])->middleware('auth');

Route::post('/users/create', [UserController::class, 'store'])->middleware('auth');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('auth');

Route::post('/users/{id}/edit', [UserController::class, 'update'])->middleware('auth');

Route::get('/supports', [UserController::class, 'support']);

Route::get('test', function () {
    return view('issue.test');
});

require __DIR__ . '/auth.php';

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
