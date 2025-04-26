<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function tampilregistrasi()
    {
        return view('auth.registrasi');
    }
    function submitregistrasi(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,user,mahasiswa,dosen'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login.tampil');
    }
    function tampillogin()
    {
        return view('auth.login');
    }
    function submitlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            return match ($role) {
                'admin' => redirect()->route('admin.dashboard'),
                'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
                'dosen' => redirect()->route('dosen.dashboard'),
                default => redirect()->route('user.dashboard'),
            };
        }
        return redirect()->back()->with('Gagal', 'Email atau Password Salah');
    }
    function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.tampil');
    }
}
