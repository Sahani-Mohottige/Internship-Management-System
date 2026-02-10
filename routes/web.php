<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HRController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    return match ($user?->role) {
        'hr' => redirect('/hr/dashboard'),
        'supervisor' => redirect('/supervisor/dashboard'),
        'student' => redirect('/student/dashboard'),
        default => view('dashboard'),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['auth','role:hr'])->get('/hr/dashboard', [HRController::class, 'index']);
    Route::middleware(['auth','role:supervisor'])->get('/supervisor/dashboard', [SupervisorController::class, 'index']);
    Route::middleware(['auth','role:student'])->get('/student/dashboard', [StudentController::class, 'index']);

});

require __DIR__.'/auth.php';
