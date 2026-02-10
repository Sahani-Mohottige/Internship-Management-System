<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HRController extends Controller
{
    public function index()
    {
        // All interns
        $internships = DB::table('internships')
            ->join('users', 'internships.student_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.email', 'internships.status as internship_status')
            ->get();

        // All reports
        $reports = DB::table('reports')
            ->join('internships', 'reports.internship_id', '=', 'internships.id')
            ->join('users', 'internships.student_id', '=', 'users.id')
            ->select('reports.id', 'reports.report_title as title', 'reports.status', 'users.name as student_name')
            ->get();

        // All leave requests
        $leaves = DB::table('leaves')
            ->join('users', 'leaves.student_id', '=', 'users.id')
            ->select('leaves.id', 'leaves.reason', 'leaves.status', 'users.name as student_name')
            ->get();

        // All users (students + supervisors)
        $users = DB::table('users')->get();

        return view('hr.dashboard', compact('internships','reports','leaves','users'));
    }
}
