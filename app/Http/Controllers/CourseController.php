<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Menampilkan semua data kursus
    public function index()
    {
        $courses = Course::latest()->get();

        return view('courses.index', compact('courses'));
    }

    // Menampilkan formulir tambah kursus
    public function create()
    {
        return view('courses.create');
    }

    // Menyimpan kursus baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:courses,code',
            'name' => 'required|string|max:120',
            'description' => 'nullable|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:0|max:65535',
            'start_date' => 'required|date',
            'status' => 'required|in:draft,open,closed',
        ]);

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan!');
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
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:courses,code,' . $course->id,
            'name' => 'required|string|max:120',
            'description' => 'nullable|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:0|max:65535',
            'start_date' => 'required|date',
            'status' => 'required|in:draft,open,closed',
        ]);

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil diperbarui!');
    }

    // Menghapus kursus
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil dihapus!');
    }
}
