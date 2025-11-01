<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $adminUser = 'admin';
        $adminPass = 'admin123';

        if ($request->username === $adminUser && $request->password === $adminPass) {
            session()->put('is_admin', true);
            session()->put('admin_username', $adminUser);
            return redirect('/dashboard')->with('success', 'Berhasil login.');
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        session()->forget(['is_admin', 'admin_username']);
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
