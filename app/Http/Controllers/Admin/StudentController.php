<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(10);

        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:students,username',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'password' => 'required|string|min:6',
        ]);

        $hashedPass = Hash::make($request->password);

        Student::create([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => $hashedPass,
        ]);

        return redirect()->route('admin.student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:students,username,'.$student->id,
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email,'.$student->id,
            'password' => 'nullable|string|min:6',
        ]);

        $hashedPass = Hash::make($request->password);

        $student->update([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => $request->password ? $hashedPass : $student->password,
        ]);

        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.student.index');
    }
}
