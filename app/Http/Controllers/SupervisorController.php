<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupervisorController extends Controller
{
    public function index()
    {
        $supervisorId = Auth::id(); // logged-in supervisor

        // Get interns assigned to this supervisor
        $interns = DB::table('internships')
            ->join('users', 'internships.student_id', '=', 'users.id')
            ->where('internships.supervisor_id', $supervisorId)
            ->select('users.id', 'users.name', 'users.email', 'internships.status as internship_status')
            ->get();

        // Get all reports of these interns
        $reports = DB::table('reports')
            ->join('internships', 'reports.internship_id', '=', 'internships.id')
            ->join('users', 'internships.student_id', '=', 'users.id')
            ->where('internships.supervisor_id', $supervisorId)
            ->select('reports.id', 'reports.report_title as title', 'reports.status', 'users.name as student_name')
            ->get();

        return view('supervisor.dashboard', compact('interns', 'reports'));
    }
}
