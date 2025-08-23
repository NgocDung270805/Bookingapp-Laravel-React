<?php
// app/Http/Controllers/Api/Auth/SocialiteController.php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Chuyển hướng người dùng đến trang xác thực của nhà cung cấp.
     */
    public function redirectToProvider($provider)
    {
        $redirectUrl = env('GOOGLE_FRONTEND_URL');
        $response = Socialite::driver('google')->stateless()->redirectUrl($redirectUrl)->redirect();
        return $response;
    }

    /**
     * Nhận callback từ nhà cung cấp và xử lý đăng nhập/đăng ký.
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        Log::info('Received social callback from provider', ['provider' => $provider, 'query_params' => $request->all()]);

        try {
            // ✅ Laravel Socialite sẽ tự động trao đổi mã xác thực với Google
            $socialUser = Socialite::driver($provider)
                ->stateless()
                ->redirectUrl(env('GOOGLE_FRONTEND_URL')) // 👈 thêm dòng này
                ->user();

            Log::info('Successfully fetched user info from Google', ['email' => $socialUser->getEmail(), 'name' => $socialUser->getName()]);

            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName(),
                    'password' => Hash::make(Str::random(16)),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'email_verified_at' => now(),
                ]
            );

            // Nếu là account mới gán mặc định là user
            if ($user->wasRecentlyCreated) {
                // Giả sử có role `user` thì gán role cho user là user
                $user->assignRole('user');
            }

            $role = $user->getRoleNames()->first();
            $token = $user->createToken('auth-token')->plainTextToken;

            Log::info('User login successful. Redirecting to frontend.', ['user_id' => $user->id]);

            // ✅ Chuyển hướng về frontend, đính kèm token và thông tin user
            return redirect(env('FRONTEND_URL') . '/auth/callback?token=' . $token .
                '&user_name=' . urlencode($user->name) .
                '&user_email=' . urlencode($user->email));
        } catch (\Exception $e) {
            Log::error('Socialite login failed', ['error' => $e->getMessage()]);
            // ✅ Chuyển hướng về frontend với thông báo lỗi
            return redirect(env('FRONTEND_URL') . '/auth/callback?error=login_failed');
        }
    }
}
