<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    /**
     * Login với thông tin từ Google/Facebook (chỉ cần email)
     */
    /**
     * Login với thông tin từ Google/Facebook (chỉ cần email)
     * Tự động tạo tài khoản mới nếu chưa có
     */
    public function loginWithSocial(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'name' => ['nullable', 'string', 'max:255'],
            'provider' => ['required', 'in:google,facebook'],
            'device_name' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            // Tìm user bằng email
            $user = User::where('email', $request->email)->first();

            // Nếu chưa có user, tạo mới
            if (!$user) {
                $user = User::create([
                    'name' => $request->name ?: 'User',
                    'email' => $request->email,
                    'password' => Hash::make(Str::random(16)),
                    'email_verified_at' => now(),
                ]);

                // Gán role mặc định là user
                $user->assignRole('user');

                $message = 'Đăng ký và đăng nhập thành công!';
            } else {
                $message = 'Đăng nhập thành công!';
            }

            // Kiểm tra role - chỉ cho phép admin, manager và user
            if (!$user->hasRole('admin') && !$user->hasRole('manager') && !$user->hasRole('user')) {
                return response()->json([
                    'message' => 'Tài khoản của bạn không có quyền truy cập.',
                    'error' => 'UNAUTHORIZED_ROLE'
                ], 403);
            }

            // Tạo Sanctum token
            $deviceName = $request->input('device_name', $request->provider . '_login');
            $token = $user->createToken($deviceName)->plainTextToken;

            // Tải các relationship nếu cần
            $user->load(['profile', 'details']);

            return response()->json([
                'message' => $message,
                'user' => $user,
                'token' => $token,
                'role' => $user->getRoleNames()->first()
            ]);
        } catch (\Exception $e) {
            Log::error('Social login failed: ' . $e->getMessage(), [
                'email' => $request->email,
                'provider' => $request->provider
            ]);

            return response()->json([
                'message' => 'Đăng nhập thất bại. Vui lòng thử lại.',
                'error' => 'SOCIAL_LOGIN_FAILED'
            ], 500);
        }
    }

    /**
     * Đăng ký tài khoản mới từ social (nếu cần mở sau này)
     */
    public function registerWithSocial(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'name' => ['required', 'string', 'max:255'],
            'provider' => ['required', 'in:google,facebook'],
            'device_name' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            // Tạo user mới
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(16)), // Random password
                'email_verified_at' => now(), // Mark as verified từ social
            ]);

            // Gán role mặc định
            $user->assignRole('user'); // Hoặc role khác nếu cần

            $deviceName = $request->input('device_name', $request->provider . '_register');
            $token = $user->createToken($deviceName)->plainTextToken;

            $user->load(['profile', 'details']);

            return response()->json([
                'message' => 'Đăng ký thành công!',
                'user' => $user,
                'token' => $token,
                'role' => $user->getRoleNames()->first()
            ], 201);
        } catch (\Exception $e) {
            Log::error('Social register failed: ' . $e->getMessage(), [
                'email' => $request->email,
                'provider' => $request->provider
            ]);

            return response()->json([
                'message' => 'Đăng ký thất bại. Vui lòng thử lại.',
                'error' => 'SOCIAL_REGISTER_FAILED'
            ], 500);
        }
    }
}
