<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.authentication.card.sign-in');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('home');
            }

            if ($user->hasRole('manage')) {
                return redirect()->route('home');
            }

            if ($user->hasRole('user')) {
                return redirect()->route('welcome'); // hoặc route('home')
                // return redirect()->away('http://localhost:5173/');
                // return redirect()->away('http://localhost:3000/');
            }

            // Nếu không có role nào hợp lệ
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Tài khoản không có quyền truy cập.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
