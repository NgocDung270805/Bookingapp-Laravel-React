<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage; // Để xử lý ảnh avatar

class ProfileController extends Controller
{
    /**
     * Display the authenticated user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        // Tải profile và details của người dùng đang xác thực
        $user = $request->user()->load(['profile', 'details', 'roles', 'permissions']);

        return response()->json([
            'message' => 'User profile retrieved successfully',
            'user' => $user,
        ]);
    }

    /**
     * Update the authenticated user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // User Profile fields
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'ward' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date'],
            'gender' => ['nullable', Rule::in(['nam', 'nu', 'khac'])],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'zalo' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'job_title' => ['nullable', 'string', 'max:255'],
            // User Details fields
            'id_number' => ['nullable', 'string', 'max:255'],
            'id_issued_date' => ['nullable', 'date'],
            'id_issued_place' => ['nullable', 'string', 'max:255'],
            'marital_status' => ['nullable', 'string', 'max:255'],
            'nationality' => ['nullable', 'string', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'tiktok_url' => ['nullable', 'url', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'company_address' => ['nullable', 'string', 'max:255'],
            'working_status' => ['nullable', 'string', 'max:255'],
            'shipping_note' => ['nullable', 'string'],
            'preferred_payment' => ['nullable', 'string', 'max:255'],
            // 'points', 'slug', 'status', 'last_login_at', 'device_info' không nên cho phép update qua API này
        ]);

        $avatarPath = $user->profile->avatar ?? null;
        if ($request->hasFile('avatar')) {
            // Xóa ảnh cũ nếu có
            if ($avatarPath && Storage::disk('public')->exists($avatarPath)) {
                Storage::disk('public')->delete($avatarPath);
            }
            $avatarPath = Storage::disk('public')->putFile('uploads/avatars', $request->file('avatar'));
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Cập nhật hoặc tạo mới profile
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id], // Điều kiện tìm kiếm
            [
                'avatar' => $avatarPath,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'district' => $request->district,
                'ward' => $request->ward,
                'country' => $request->country,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'facebook_url' => $request->facebook_url,
                'zalo' => $request->zalo,
                'bio' => $request->bio,
                'job_title' => $request->job_title,
            ]
        );

        // Cập nhật hoặc tạo mới details
        $user->details()->updateOrCreate(
            ['user_id' => $user->id], // Điều kiện tìm kiếm
            [
                'id_number' => $request->id_number,
                'id_issued_date' => $request->id_issued_date,
                'id_issued_place' => $request->id_issued_place,
                'marital_status' => $request->marital_status,
                'nationality' => $request->nationality,
                'instagram_url' => $request->instagram_url,
                'linkedin_url' => $request->linkedin_url,
                'tiktok_url' => $request->tiktok_url,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'working_status' => $request->working_status,
                'shipping_note' => $request->shipping_note,
                'preferred_payment' => $request->preferred_payment,
            ]
        );

        // Tải lại user với các mối quan hệ đã cập nhật để trả về response mới nhất
        $user->load(['profile', 'details', 'roles', 'permissions']);

        return response()->json([
            'message' => 'User profile updated successfully',
            'user' => $user,
        ]);
    }
}