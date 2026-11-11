<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    // Menampilkan form pendaftaran
    public function create()
    {
        $participants = Participant::orderBy('name')->get();

        $courses = Course::where('status', 'open')
            ->orderBy('name')
            ->get();

        return view('enrollments.create', compact('participants', 'courses'));
    }

    // Menyimpan pendaftaran peserta
    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => ['required', 'exists:participants,id'],
            'course_id' => [
                'required',
                'exists:courses,id',
                Rule::unique('enrollments')->where(
                    fn ($query) => $query->where(
                        'participant_id',
                        $request->participant_id
                    )
                ),
            ],
        ], [
            'course_id.unique' => 'Peserta ini sudah terdaftar pada kursus tersebut.',
        ]);

        Enrollment::create([
            'participant_id' => $request->participant_id,
            'course_id' => $request->course_id,
            'status' => 'registered',
        ]);

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Pendaftaran berhasil disimpan.');
    }

    // Menampilkan laporan pendaftaran
    public function index()
    {
        $enrollments = Enrollment::with([
            'participant',
            'course'
        ])->latest()->get();

        return view('enrollments.index', compact('enrollments'));
    }
}
