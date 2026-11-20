<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Menampilkan data kursus dengan pencarian, filter, dan pagination
public function index(Request $request)
{
    $query = Course::query();

    // Fitur pencarian berdasarkan kode dan nama kursus
    if ($request->filled('q')) {
        $keyword = trim($request->q);

        $query->where(function ($q) use ($keyword) {
            $q->where('code', 'like', "%{$keyword}%")
              ->orWhere('name', 'like', "%{$keyword}%");
        });
    }

    // Filter berdasarkan status kursus
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Pagination 10 data per halaman
    $courses = $query->latest()
        ->paginate(10)
        ->withQueryString();

    return view('courses.index', compact('courses'));
}

    // Menampilkan formulir tambah kursus
    public function create()
    {
        return view('courses.create');
    }

    // Menyimpan kursus baru
    
public function store(StoreCourseRequest $request)
{
    Course::create($request->validated());

    return to_route('courses.index')
        ->with('success', 'Kursus berhasil ditambahkan.');
}


    // Menampilkan detail satu kursus
    public function show(string $id)
    {
        $course = Course::findOrFail($id);

        return view('courses.show', compact('course'));
    }

    // Menampilkan formulir edit kursus
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);

        return view('courses.edit', compact('course'));
    }

    // Menyimpan perubahan kursus
    
public function update(UpdateCourseRequest $request, Course $course)
{
    $course->update($request->validated());

    return to_route('courses.show', $course)
        ->with('success', 'Kursus berhasil diperbarui.');
}


    // Menghapus kursus
    
public function destroy(Course $course)
{
    $course->delete();

    return to_route('courses.index')
        ->with('success', 'Kursus berhasil dihapus.');
}

}
