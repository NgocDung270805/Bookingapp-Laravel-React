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
                return redirect()->route('home')->with('success', 'Login thành công! Chào mừng quản trị viên trở lại.');
            }

            if ($user->hasRole('manage')) {
                return redirect()->route('home')->with('success', 'Login thành công! Chào mừng quản lý trở lại.');
            }

            if ($user->hasRole('user')) {
                return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập. Vui lòng liên hệ quản trị viên.');
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
