<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $manageRole = Role::firstOrCreate(['name' => 'manage']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Tạo permissions
        $createPost = Permission::firstOrCreate(['name' => 'create post']);
        $editPost = Permission::firstOrCreate(['name' => 'edit post']);

        // Gán quyền cho admin và manage
        $adminRole->givePermissionTo([$createPost, $editPost]);
        $manageRole->givePermissionTo([$createPost]);

        // Gán role admin cho user có id 1, 3, 6, 9
        $adminIds = [1, 3, 6, 9];
        foreach ($adminIds as $id) {
            $user = User::find($id);
            if ($user) $user->assignRole($adminRole);
        }

        // Gán role manage cho user có id 5, 8
        $managerIds = [5, 8];
        foreach ($managerIds as $id) {
            $user = User::find($id);
            if ($user) $user->assignRole($manageRole);
        }

        // Gán role user cho các user còn lại
        $allUserIds = User::pluck('id')->toArray();
        $assignedIds = array_merge($adminIds, $managerIds);
        $userIds = array_diff($allUserIds, $assignedIds);

        foreach ($userIds as $id) {
            $user = User::find($id);
            if ($user) $user->assignRole($userRole);
        }
    }
}
