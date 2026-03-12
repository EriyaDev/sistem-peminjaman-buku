<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // validasi
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // login
        if (! Auth::guard('admin')->attempt($validatedData)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, your credentials do not match!',
            ]);
        }

        // buat session token
        request()->session()->regenerate();

        // return Auth::guard('admin')->user();

        // redirect
        return redirect()->route('admin.dashboard')->with('success', '');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', '');
    }

    // public function showRegisterForm()
    // {
    //     // return view('Admin.Auth.register');
    // }

    // public function register(Request $request)
    // {
    //     // validasi
    //     $validatedData = $request->validate([
    //         'username' => 'required|string',
    //         'email' => 'required|email',
    //         'password' => ['required', Password::min(6), 'confirmed'],
    //     ]);

    //     $hashedPass = Hash::make($request->password);

    //     $admin = Admin::create([
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => $hashedPass,
    //     ]);

    //     Auth::guard('admin')->login($admin);

    //     return redirect()->route('collaborative-partner.index')->with('success', '');
    // }
}
