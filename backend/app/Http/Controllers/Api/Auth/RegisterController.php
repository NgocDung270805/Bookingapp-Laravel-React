<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB; // Thêm dòng này

class RegisterController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:255'], // Thêm các trường profile/details nếu bạn muốn đăng ký cùng lúc
            'address' => ['nullable', 'string', 'max:255'],
            // Thêm các rules cho user_details nếu cần
        ]);

        DB::beginTransaction(); // Bắt đầu transaction

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Gán vai trò mặc định 'user' nếu bạn đang sử dụng Spatie Roles & Permissions
            // Đảm bảo role 'user' đã tồn tại trong DB
            $user->assignRole('user'); //

            // Tạo hồ sơ người dùng trống hoặc với dữ liệu ban đầu
            $user->profile()->create([
                'phone' => $request->phone,
                'address' => $request->address,
                // ... các trường khác có thể null hoặc mặc định
            ]);

            // Tạo chi tiết người dùng trống hoặc với dữ liệu ban đầu
            $user->details()->create([
                'status' => 'active', // Mặc định active
                'points' => 0,       // Mặc định 0 điểm
                // ... các trường khác có thể null hoặc mặc định
            ]);

            DB::commit(); // Commit transaction

            // Tải các mối quan hệ profile và details nếu cần trả về
            $user->load(['profile', 'details']);

            return response()->json([
                'message' => 'Registration successful',
                'user' => $user,
                'token' => $user->createToken('web_browser')->plainTextToken, // Tạo token ngay sau khi đăng ký
            ], 201); // 201 Created

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback nếu có lỗi
            throw $e; // Re-throw lỗi để nó được Laravel xử lý
        }
    }
}