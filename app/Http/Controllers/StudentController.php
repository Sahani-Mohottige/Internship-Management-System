<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $studentId = Auth::id(); // get logged-in student ID

        // Get internship info
        $internship = DB::table('internships')
            ->where('student_id', $studentId)
            ->first();

        // Get their submitted reports
        $reports = DB::table('reports')
            ->where('student_id', $studentId)
            ->select('id', 'report_title as title', 'status', 'submitted_at')
            ->orderByDesc('submitted_at')
            ->get();

        // Get their leave requests
        $leaves = DB::table('leaves')
            ->where('student_id', $studentId)
            ->get();

        // Pass all this data to the Blade view
        return view('student.dashboard', compact('internship', 'reports', 'leaves'));
    }
}
