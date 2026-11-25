<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordResetController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route pendaftaran peserta
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

// Route preview pendaftaran lama
Route::post('/pendaftaran/preview', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|min:3|max:100',
        'email' => 'required|email',
        'course_id' => 'required|integer',
    ]);

    $courses = [
        1 => 'Web Dasar',
        2 => 'PHP Dasar',
        3 => 'Laravel Dasar',
    ];

    $courseName = $courses[$validated['course_id']] ?? null;

    if (!$courseName) {
        return back()->withErrors([
            'course_id' => 'Pilihan kursus tidak valid.',
        ])->withInput();
    }

    return view('enrollments.preview', [
        'registration' => $validated,
        'courseName' => $courseName,
    ]);
})->name('enrollments.preview');

// Route pengecekan ketersediaan kursus
Route::get('/courses/{id}/availability', function ($id) {
    $courses = [
        1 => ['name' => 'Web Dasar', 'remaining' => 15],
        2 => ['name' => 'PHP Dasar', 'remaining' => 10],
        3 => ['name' => 'Laravel Dasar', 'remaining' => 8],
    ];

    if (!isset($courses[$id])) {
        return response()->json([
            'message' => 'Kursus tidak ditemukan',
        ], 404);
    }

    return response()->json([
        'course' => $courses[$id]['name'],
        'remaining' => $courses[$id]['remaining'],
    ]);
})->name('courses.availability');

// Route CRUD kursus
Route::resource('courses', CourseController::class);
 
// Route Login
Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

// Route Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// Route halaman profil
Route::middleware('auth')->get('/profile', [ProfileController::class, 'index'])
    ->name('profile');

// Forgot Password
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPassword'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])
    ->middleware('guest')
    ->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPassword'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.update');