<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('users', App\Http\Controllers\UserController::class)->only(
	[ 'index', 'create', 'edit', 'show'], 
	['names' => ['index' => 'admin.users.index', 'create' => 'admin.users.create', 'edit' => 'admin.users.edit', 'show' => 'admin.users.show']]
);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
