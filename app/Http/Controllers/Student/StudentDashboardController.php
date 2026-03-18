<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class StudentDashboardController extends Controller
{
    public function dashboard()
    {
        $student = auth()->guard('student')->user();
        $borrowedBooksCount = Transaction::where('student_id', $student->id)->where('status', 'borrowed')->count();
        $history = Transaction::where('student_id', $student->id)->latest()->get();

        return view('student.dashboard', compact('borrowedBooksCount', 'history'));
    }
}
