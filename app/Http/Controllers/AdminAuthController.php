<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->email === env('ADMIN_USER') && $request->password === env('ADMIN_PASS')) {
            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Identifiants invalides.']);
    }

    public function logout()
    {
        session()->forget('is_admin');
        return redirect()->route('admin.login');
    }
}
