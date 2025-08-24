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
use App\Models\Users_profiles;

// class SocialiteController extends Controller
// {
//     /**
//      * Chuyển hướng người dùng đến trang xác thực của nhà cung cấp.
//      */
//     public function redirectToProvider($provider)
//     {
//         $redirectUrl = env('GOOGLE_FRONTEND_URL');
//         $response = Socialite::driver('google')->stateless()->redirectUrl($redirectUrl)->redirect();
//         return $response;
//     }

//     /**
//      * Nhận callback từ nhà cung cấp và xử lý đăng nhập/đăng ký.
//      */
//     public function handleProviderCallback(Request $request, $provider)
//     {
//         Log::info('Received social callback from provider', ['provider' => $provider, 'query_params' => $request->all()]);

//         try {
//             // ✅ Laravel Socialite sẽ tự động trao đổi mã xác thực với Google
//             $socialUser = Socialite::driver($provider)
//                 ->stateless()
//                 ->redirectUrl(env('GOOGLE_FRONTEND_URL')) // 👈 thêm dòng này
//                 ->user();

//             Log::info('Successfully fetched user info from Google', ['email' => $socialUser->getEmail(), 'name' => $socialUser->getName()]);

//             $user = User::firstOrCreate(
//                 ['email' => $socialUser->getEmail()],
//                 [
//                     'name' => $socialUser->getName(),
//                     'password' => Hash::make(Str::random(16)),
//                     'provider' => $provider,
//                     'provider_id' => $socialUser->getId(),
//                     'email_verified_at' => now(),
//                 ]
//             );

//             // Nếu là account mới gán mặc định là user
//             if ($user->wasRecentlyCreated) {
//                 // Tạo một user profile mới
//                 $userProfile = Users_profiles::create([
//                     'user_id' => $user->id,
//                 ]);

//                 // Gán role 'user' cho người dùng mới
//                 $user->assignRole('user');
//             }

//             $role = $user->getRoleNames()->first();
//             $token = $user->createToken('auth-token')->plainTextToken;

//             Log::info('User login successful. Redirecting to frontend.', ['user_id' => $user->id]);

//             // ✅ Chuyển hướng về frontend, đính kèm token và thông tin user
//             return redirect(env('FRONTEND_URL') . '/auth/callback?token=' . $token .
//                 '&user_name=' . urlencode($user->name) .
//                 '&user_email=' . urlencode($user->email));
//         } catch (\Exception $e) {
//             Log::error('Socialite login failed', ['error' => $e->getMessage()]);
//             // ✅ Chuyển hướng về frontend với thông báo lỗi
//             return redirect(env('FRONTEND_URL') . '/auth/callback?error=login_failed');
//         }
//     }
// }
class SocialiteController extends Controller
{
    /**
     * Chuyển hướng người dùng đến trang xác thực của nhà cung cấp.
     */
    public function redirectToProvider($provider)
    {
        // ✅ Logic Google
        if ($provider === 'google') {
            $redirectUrl = env('GOOGLE_REDIRECT_URL');
            $response = Socialite::driver('google')->stateless()->redirectUrl($redirectUrl)->redirect();
            return $response;
        }

        // ✅ Logic Facebook
        if ($provider === 'facebook') {
            // return Socialite::driver('facebook')->stateless()->redirect();
            $redirectUrl = env('FACEBOOK_REDIRECT_URL');
            $response = Socialite::driver('facebook')->stateless()->redirectUrl($redirectUrl)->redirect();
            return $response;
        }

        // Thông báo lỗi nếu nhà cung cấp không được hỗ trợ
        return response()->json(['message' => 'Nhà cung cấp không được hỗ trợ!'], 400);
    }

    /**
     * Nhận callback từ nhà cung cấp và xử lý đăng nhập/đăng ký.
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        Log::info('Received social callback from provider', ['provider' => $provider, 'query_params' => $request->all()]);

        try {
            $socialUser = null;
            $email = null;
            $name = null;
            $providerId = null;
            $isEmailPlaceholder = false;

            // ✅ Logic Google
            if ($provider === 'google') {
                $socialUser = Socialite::driver($provider)
                    ->stateless()
                    ->redirectUrl(env('GOOGLE_REDIRECT_URL'))
                    ->user();
                Log::info('Successfully fetched user info from Google', ['email' => $socialUser->getEmail(), 'name' => $socialUser->getName()]);

                $email = $socialUser->getEmail();
                $name = $socialUser->getName();
                $providerId = $socialUser->getId();
            }
            // ✅ Logic Facebook
            else if ($provider === 'facebook') {
                // $socialUser = Socialite::driver('facebook')->stateless()->user();
                $socialUser = Socialite::driver($provider)
                    ->stateless()
                    ->redirectUrl(env('FACEBOOK_REDIRECT_URL'))
                    ->user();
                $email = $socialUser->getEmail();
                if (empty($email)) {
                    // Tạo email giả định
                    $email = $socialUser->getId() . '@vandaicar.com';
                    $isEmailPlaceholder = true;
                    Log::info('Facebook user has no email. Using placeholder.', ['email' => $email]);
                }
                $name = $socialUser->getName() ?? 'User';
                $providerId = $socialUser->getId();
            } else {
                return response()->json(['message' => 'Provider not supported'], 400);
            }

            // Kiểm tra xem email có tồn tại không trước khi tạo người dùng
            if (empty($email)) {
                return response()->json(['message' => 'Could not retrieve user email from provider'], 400);
            }

            // Tạo hoặc tìm người dùng trong database
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make(Str::random(16)),
                    'provider' => $provider,
                    'provider_id' => $providerId,
                    'email_verified_at' => $isEmailPlaceholder ? null : now(),
                ]
            );

            // Nếu là account mới gán mặc định là user
            if ($user->wasRecentlyCreated) {
                // Tạo một user profile mới
                $userProfile = Users_profiles::create([
                    'user_id' => $user->id,
                ]);

                // Gán role 'user' cho người dùng mới
                $user->assignRole('user');
            }

            $role = $user->getRoleNames()->first();
            $token = $user->createToken('auth-token')->plainTextToken;

            Log::info('User login successful. Redirecting to frontend.', ['user_id' => $user->id]);

            // Chuyển hướng về frontend, đính kèm token và thông tin user
            return redirect(env('FRONTEND_URL') . '/auth/callback?token=' . $token .
                '&user_name=' . urlencode($user->name) .
                '&user_email=' . urlencode($user->email));
        } catch (\Exception $e) {
            Log::error('Socialite login failed', ['error' => $e->getMessage()]);
            // Chuyển hướng về frontend với thông báo lỗi
            return redirect(env('FRONTEND_URL') . '/auth/callback?error=login_failed');
        }
    }
}
