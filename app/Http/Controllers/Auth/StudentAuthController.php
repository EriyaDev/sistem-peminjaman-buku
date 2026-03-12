<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class StudentAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('student.auth.login');
    }

    public function login(Request $request)
    {
        // validasi
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // login
        if (! Auth::guard('student')->attempt($validatedData)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, your credentials do not match!',
            ]);
        }

        // buat session token
        request()->session()->regenerate();

        // return Auth::guard('student')->user();

        // redirect
        return redirect()->route('student.dashboard')->with('success', '');
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.login')->with('success', '');
    }

    public function showRegisterForm()
    {
        // return view('Admin.Auth.register');
    }

    public function register(Request $request)
    {
        // validasi
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        $hashedPass = Hash::make($request->password);

        $admin = Student::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $hashedPass,
        ]);
    }
}
