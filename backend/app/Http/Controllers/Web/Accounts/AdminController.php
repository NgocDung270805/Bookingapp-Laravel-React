<?php

namespace App\Http\Controllers\Web\Accounts;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Lấy tất cả người dùng, eager load roles để hiển thị vai trò hiện tại và ưu tiên hiển thị tài khoản role admin trước sau đó mới đến manager sau đó cuối dùng là user
        $admins = User::select('users.*')
            ->join('model_has_roles', function ($join) {
                $join->on('users.id', '=', 'model_has_roles.model_id')
                    ->where('model_has_roles.model_type', '=', User::class);
            })
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->whereIn('roles.name', ['admin', 'manager', 'user'])
            ->orderByRaw("CASE roles.name 
            WHEN 'admin' THEN 1 
            WHEN 'manager' THEN 2 
            WHEN 'user' THEN 3 
            ELSE 4 END")
            ->with('roles') // để eager load
            ->get();
        // dd($admins);
        return view('apps.account.admin.index', compact('admins'));
    }

    public function edit($id)
    {
        try {
            // Tải eager loading các mối quan hệ userProfile, userDetail và roles
            $user = User::with('userProfile', 'userDetail', 'roles')->find($id);

            // dd($user);

            if (!$user) {
                return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
            }

            // Lấy tất cả các vai trò hiện có để hiển thị trong form phân quyền
            $allRoles = Role::all();

            // Thêm thông tin về tất cả các vai trò vào phản hồi JSON
            $user->all_roles = $allRoles;

            return response()->json($user);
        } catch (Throwable $e) {
            Log::error('Lỗi khi tìm nạp dữ liệu người dùng: ' . $e->getMessage());
            return response()->json(['message' => 'Đã xảy ra lỗi khi tìm nạp dữ liệu.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
            }

            // --- Cập nhật bảng users ---
            $userValidationRules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed',
            ];
            $validatedUserData = $request->validate($userValidationRules);

            $user->name = $validatedUserData['name'];
            $user->email = $validatedUserData['email'];
            if (!empty($validatedUserData['password'])) {
                $user->password = Hash::make($validatedUserData['password']);
            }
            $user->save();

            // --- Cập nhật hoặc tạo bảng users_profiles ---
            $userProfile = $user->userProfile()->firstOrNew(['user_id' => $user->id]);
            $profileValidationRules = [
                'phone' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'district' => 'nullable|string|max:255',
                'ward' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'birthday' => 'nullable|date',
                'gender' => 'nullable|in:nam,nu,khac',
                'facebook_url' => 'nullable|url|max:255',
                'zalo' => 'nullable|string|max:255',
                'bio' => 'nullable|string',
                'job_title' => 'nullable|string|max:255',
                'avatar' => 'nullable|string|max:255',
            ];
            $validatedProfileData = $request->validate($profileValidationRules);
            $userProfile->fill($validatedProfileData);
            $userProfile->save();

            // --- Cập nhật hoặc tạo bảng user_details ---
            $userDetail = $user->userDetail()->firstOrNew(['user_id' => $user->id]);
            $detailValidationRules = [
                'id_number' => 'nullable|string|max:255',
                'id_issued_date' => 'nullable|date',
                'id_issued_place' => 'nullable|string|max:255',
                'marital_status' => 'nullable|string|max:255',
                'nationality' => 'nullable|string|max:255',
                'instagram_url' => 'nullable|url|max:255',
                'linkedin_url' => 'nullable|url|max:255',
                'tiktok_url' => 'nullable|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'company_address' => 'nullable|string|max:255',
                'working_status' => 'nullable|string|max:255',
                'shipping_note' => 'nullable|string',
                'preferred_payment' => 'nullable|string|max:255',
                'points' => 'nullable|integer', // Đã sửa từ NOT NULL trong DB dump của bạn
                'slug' => 'nullable|string|max:255',
                'status' => 'nullable|string|max:255',
                'last_login_at' => 'nullable|date',
                'device_info' => 'nullable|string',
            ];
            $validatedDetailData = $request->validate($detailValidationRules);
            // Chuyển định dạng last_login_at nếu có
            if (!empty($validatedDetailData['last_login_at'])) {
                try {
                    $validatedDetailData['last_login_at'] = \Carbon\Carbon::parse($validatedDetailData['last_login_at'])->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    Log::error('Lỗi định dạng ngày last_login_at: ' . $e->getMessage());
                    $validatedDetailData['last_login_at'] = null;
                }
            }
            $userDetail->fill($validatedDetailData);
            $userDetail->save();

            // --- Cập nhật Vai trò (Roles) ---
            if ($request->has('roles')) {
                $user->syncRoles($request->input('roles')); // Gán các vai trò mới cho người dùng
            } else {
                $user->syncRoles([]); // Nếu không có vai trò nào được chọn, gỡ bỏ tất cả vai trò
            }


            return response()->json(['message' => 'Thông tin người dùng và vai trò đã được cập nhật thành công'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Lỗi xác thực khi cập nhật người dùng: ' . json_encode($e->errors()));
            return response()->json(['message' => 'Lỗi xác thực', 'errors' => $e->errors()], 422);
        } catch (Throwable $e) {
            Log::error('Lỗi chung khi cập nhật người dùng: ' . $e->getMessage());
            return response()->json(['message' => 'Đã xảy ra lỗi khi cập nhật dữ liệu.'], 500);
        }
    }

    // Phương thức mới để xử lý phân quyền riêng
    public function assignRoles(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
            }

            $request->validate([
                'roles' => 'array', // Đảm bảo 'roles' là một mảng
                'roles.*' => 'exists:roles,name', // Đảm bảo mỗi vai trò tồn tại trong bảng 'roles'
            ]);

            // Đồng bộ hóa các vai trò cho người dùng
            $user->syncRoles($request->input('roles', [])); // Nếu 'roles' không có, mặc định là mảng rỗng để xóa hết vai trò

            return response()->json(['message' => 'Phân quyền đã được cập nhật thành công'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Lỗi xác thực khi phân quyền: ' . json_encode($e->errors()));
            return response()->json(['message' => 'Lỗi xác thực', 'errors' => $e->errors()], 422);
        } catch (Throwable $e) {
            Log::error('Lỗi chung khi phân quyền: ' . $e->getMessage());
            return response()->json(['message' => 'Đã xảy ra lỗi khi phân quyền.'], 500);
        }
    }
}
