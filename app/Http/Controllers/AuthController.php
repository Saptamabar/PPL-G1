<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::viaRemember()) {
            return $this->redirectToDashboard();
        }

        if (Auth::check()) {
            return $this->redirectToDashboard();
        }

        return view('auth.login');
    }

    protected function redirectToDashboard()
    {
        if (Auth::user()->role === 'admin') {
            return redirect('/dashboardadmin');
        }
        return redirect('/dashboardkaryawan');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/dashboardadmin');
            } else {
                return redirect()->intended('/dashboardkaryawan');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
