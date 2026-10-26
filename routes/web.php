<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/pendaftaran', function () {
    $courses = [
        1 => ['name' => 'Web Dasar'],
        2 => ['name' => 'PHP Dasar'],
        3 => ['name' => 'Laravel Dasar'],
    ];

    return view('enrollments.create', compact('courses'));
})->name('enrollments.create');




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
