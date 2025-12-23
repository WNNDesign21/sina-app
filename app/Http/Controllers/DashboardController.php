<?php

namespace App\Http\Controllers;

use App\Models\AcademicRecord;
use App\Models\Student;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // --- STUDENT DASHBOARD LOGIC ---
        if ($user->role === 'mahasiswa') {
            $nim = $user->username;
            $student = Student::where('nim', $nim)->first();

            // Fetch Student Records
            $records = AcademicRecord::where('student_nim', $nim)
                ->with('course')
                ->latest()
                ->get();

            // Calculate IPS (GPA)
            $totalSks = 0;
            $totalPoints = 0;

            // Chart Data - Distribution per Course
            $chartData = [];

            foreach ($records as $record) {
                if ($record->course) {
                    $sks = $record->course->sks;
                    $totalSks += $sks;
                    $totalPoints += ($record->grade_point * $sks);

                    // Add course to chart data
                    $courseName = $record->course->name;
                    if (!isset($chartData[$courseName])) {
                        $chartData[$courseName] = 0;
                    }
                    $chartData[$courseName] += $sks; // Use SKS as weight
                }
            }

            $ips = $totalSks > 0 ? number_format($totalPoints / $totalSks, 2) : '0.00';

            return view('student_dashboard', compact(
                'student',
                'records',
                'ips',
                'totalSks',
                'chartData'
            ));
        }

        // --- LECTURER / ADMIN DASHBOARD LOGIC ---
        $lecturer = null;
        $lecturerName = $user->username;
        $userRole = ucfirst($user->role);

        // Get lecturer info if user is a lecturer
        if ($user->role === 'dosen') {
            $lecturer = Lecturer::where('user_id', $user->id)->first();
            if ($lecturer) {
                $lecturerName = $lecturer->name;
            }
        }

        // Filter data based on role
        if ($user->role === 'dosen' && $lecturer) {
            // Lecturer sees only their students' records
            $records = AcademicRecord::where('lecturer_id', $lecturer->id)
                ->latest()
                ->take(5)
                ->get();

            $totalStudents = AcademicRecord::where('lecturer_id', $lecturer->id)
                ->distinct('student_nim')
                ->count('student_nim');

            $averageGrade = AcademicRecord::where('lecturer_id', $lecturer->id)
                ->avg('grade_point') ?? 0;

            $grades = AcademicRecord::where('lecturer_id', $lecturer->id)
                ->select('grade_letter')
                ->selectRaw('count(*) as count')
                ->groupBy('grade_letter')
                ->pluck('count', 'grade_letter')
                ->toArray();
        } else {
            // Superuser sees all data
            $records = AcademicRecord::latest()->take(5)->get();
            $totalStudents = Student::count();
            $averageGrade = AcademicRecord::avg('grade_point') ?? 0;

            $grades = AcademicRecord::select('grade_letter')
                ->selectRaw('count(*) as count')
                ->groupBy('grade_letter')
                ->pluck('count', 'grade_letter')
                ->toArray();
        }

        $chartData = [
            'A' => $grades['A'] ?? 0,
            'A-' => $grades['A-'] ?? 0,
            'B+' => $grades['B+'] ?? 0,
            'B' => $grades['B'] ?? 0,
            'B-' => $grades['B-'] ?? 0,
            'C+' => $grades['C+'] ?? 0,
            'C' => $grades['C'] ?? 0,
            'D' => $grades['D'] ?? 0,
        ];

        // Fetch data for input form
        $students = Student::all();
        $courses = [];

        if ($user->role === 'dosen') {
            if ($lecturer) {
                // Get courses taught by this lecturer via schedules
                $courses = Course::whereHas('schedules', function ($q) use ($lecturer) {
                    $q->where('lecturer_id', $lecturer->id);
                })->get();
            }
        } else {
            // Superuser sees all courses
            $courses = Course::all();
        }

        return view('dashboard', compact(
            'records',
            'totalStudents',
            'averageGrade',
            'chartData',
            'students',
            'courses',
            'lecturerName',
            'userRole'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'p1_cs' => 'required|numeric|min:0|max:100',
            'p1_pe' => 'required|numeric|min:0|max:100',
            'p2_cs' => 'required|numeric|min:0|max:100',
            'p2_pe' => 'required|numeric|min:0|max:100',
        ]);

        $student = Student::findOrFail($validated['student_id']);

        // Check for existing record
        $existingRecord = AcademicRecord::where('student_nim', $student->nim)
            ->where('course_id', $validated['course_id'])
            ->first();

        if ($existingRecord) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Student already has a grade for this course.', 'type' => 'error'], 422);
            }
            return redirect()->back()->with('error', 'Student already has a grade for this course.');
        }

        // Calculate Grade
        $calculation = \App\Services\GradeCalculationService::calculate(
            $validated['p1_cs'],
            $validated['p1_pe'],
            $validated['p2_cs'],
            $validated['p2_pe']
        );

        $integrityHash = \App\Services\GradeCalculationService::generateIntegrityHash(
            $student->nim,
            $calculation['final_grade']
        );

        // Get lecturer ID
        $lecturerId = null;
        $user = Auth::user();
        if ($user->role === 'dosen') {
            $lecturer = Lecturer::where('user_id', $user->id)->first();
            if ($lecturer) {
                $lecturerId = $lecturer->id;
            }
        }

        try {
            AcademicRecord::create([
                'student_nim' => $student->nim,
                'student_name' => $student->name,
                'course_id' => $validated['course_id'],
                'lecturer_id' => $lecturerId,
                'p1_cs' => $validated['p1_cs'],
                'p1_pe' => $validated['p1_pe'],
                'p2_cs' => $validated['p2_cs'],
                'p2_pe' => $validated['p2_pe'],
                ...$calculation,
                'integrity_hash' => $integrityHash
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle duplicate entry error
            if ($e->getCode() == 23000) {
                if ($request->wantsJson()) {
                    return response()->json([
                        'message' => 'This student already has a grade for the selected course. Please choose a different course or student.',
                        'type' => 'error'
                    ], 422);
                }
                return redirect()->back()->with('error', 'This student already has a grade for the selected course.');
            }

            // Re-throw other exceptions
            throw $e;
        }

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Data saved securely.', 'type' => 'success']);
        }

        return redirect()->route('dashboard')->with('success', 'Data saved securely.');
    }

    public function transcript()
    {
        $user = Auth::user();

        // Only students can view transcript
        if ($user->role !== 'mahasiswa') {
            return redirect()->route('dashboard')->with('error', 'Transcript is only available for students.');
        }

        $nim = $user->username;
        $student = Student::where('nim', $nim)->first();

        if (!$student) {
            return redirect()->route('dashboard')->with('error', 'Student record not found.');
        }

        // Fetch all academic records with course details
        $records = AcademicRecord::where('student_nim', $nim)
            ->with(['course', 'lecturer'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate overall statistics
        $totalSks = 0;
        $totalPoints = 0;
        $gradeDistribution = [
            'A' => 0,
            'A-' => 0,
            'B+' => 0,
            'B' => 0,
            'B-' => 0,
            'C+' => 0,
            'C' => 0,
            'D' => 0,
            'E' => 0
        ];

        foreach ($records as $record) {
            if ($record->course) {
                $sks = $record->course->sks;
                $totalSks += $sks;
                $totalPoints += ($record->grade_point * $sks);
            }
            if (isset($gradeDistribution[$record->grade_letter])) {
                $gradeDistribution[$record->grade_letter]++;
            }
        }

        $ips = $totalSks > 0 ? number_format($totalPoints / $totalSks, 2) : '0.00';

        // Determine academic status
        $status = 'Satisfactory';
        if ($ips >= 3.5) {
            $status = 'Excellent (Cum Laude)';
        } elseif ($ips >= 3.0) {
            $status = 'Very Good';
        } elseif ($ips >= 2.5) {
            $status = 'Good';
        }

        return view('transcript', compact(
            'student',
            'records',
            'ips',
            'totalSks',
            'status',
            'gradeDistribution'
        ));
    }

    public function lecturerTranscript()
    {
        $user = Auth::user();

        // Only lecturers can view this
        if ($user->role !== 'dosen') {
            return redirect()->route('dashboard')->with('error', 'This page is only available for lecturers.');
        }

        $lecturer = Lecturer::where('user_id', $user->id)->first();

        if (!$lecturer) {
            return redirect()->route('dashboard')->with('error', 'Lecturer record not found.');
        }

        // Get all academic records taught by this lecturer
        $records = AcademicRecord::where('lecturer_id', $lecturer->id)
            ->with(['course', 'student'])
            ->orderBy('student_nim')
            ->orderBy('created_at', 'desc')
            ->get();

        // Group by student
        $studentRecords = [];
        foreach ($records as $record) {
            $nim = $record->student_nim;

            if (!isset($studentRecords[$nim])) {
                $studentRecords[$nim] = [
                    'student' => $record->student,
                    'nim' => $nim,
                    'name' => $record->student_name,
                    'records' => [],
                    'totalSks' => 0,
                    'totalPoints' => 0,
                    'ips' => 0
                ];
            }

            $studentRecords[$nim]['records'][] = $record;

            if ($record->course) {
                $sks = $record->course->sks;
                $studentRecords[$nim]['totalSks'] += $sks;
                $studentRecords[$nim]['totalPoints'] += ($record->grade_point * $sks);
            }
        }

        // Calculate IPS for each student
        foreach ($studentRecords as $nim => &$data) {
            if ($data['totalSks'] > 0) {
                $data['ips'] = number_format($data['totalPoints'] / $data['totalSks'], 2);
            }
        }

        // Get all students and courses for input modal
        $students = Student::all();
        $courses = Course::all();

        return view('lecturer_transcript', compact('lecturer', 'studentRecords', 'students', 'courses'));
    }
}
