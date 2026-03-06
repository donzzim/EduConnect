<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/functionalities', function () {
    return view('pages.functionalities');
})->name('functionalities');

Route::view('/access-denied', 'errors.403')->name('access.denied');

Route::middleware('guest')->group(function () {
    Route::redirect('/admin/login', '/login');
    Route::redirect('/teacher/login', '/login');
    Route::redirect('/student/login', '/login');
});

Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::get('/student', function () {
        return view('pages.student.index');
    })->name('student.index');
});

Route::middleware(['auth', 'verified', 'role:teacher'])->group(function () {
    Route::get('/teacher', function () {
        return view('pages.teacher.index');
    })->name('teacher.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

require __DIR__ . '/auth.php';
