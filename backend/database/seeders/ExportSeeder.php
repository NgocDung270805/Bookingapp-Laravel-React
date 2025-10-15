<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = now()->timestamp;

        // Danh sách bảng và thư mục lưu trữ
        $tables = [
            // Các bảng cốt lõi (không có khóa ngoại hoặc chỉ tự tham chiếu)
            'migrations' => 'Migrations',
            'users' => 'Users',
            'permissions' => 'Permissions',
            'roles' => 'Roles',
            'categories' => 'Categories',
            'tags' => 'Tags',
            'product_attribute_types' => 'Product Attribute Types',
            'banners' => 'Banners',
            'videos' => 'Videos',

            // Các bảng phụ thuộc Level 1
            'personal_access_tokens' => 'Personal Access Tokens', // Được giữ lại theo yêu cầu
            'users_profiles' => 'Users Profiles',
            'user_details' => 'User Details',
            'products' => 'Products',
            'product_attribute_values' => 'Product Attribute Values',
            'role_has_permissions' => 'Role Has Permissions',
            'model_has_permissions' => 'Model Has Permissions',
            'model_has_roles' => 'Model Has Roles',

            // Các bảng phụ thuộc Level 2
            'bookings' => 'Bookings',
            'comments' => 'Comments',
            'category_tag' => 'Category Tag',
            'video_category' => 'Video Category',
            'product_category' => 'Product Category',
            'product_favorites' => 'Product Favorites',
            'product_images' => 'Product Images',
            'product_tag' => 'Product Tag',
            'product_variants' => 'Product Variants',

            // Các bảng phụ thuộc Level 3
            'product_attribute_value_configs' => 'Product Attribute Value Configs',
            'product_variant_attribute_value' => 'Product Variant Attribute Value',
        ];

        foreach ($tables as $table => $folder) {
            // Tạo thư mục nếu chưa tồn tại
            if (!Storage::exists("data/$folder")) {
                Storage::makeDirectory("data/$folder");
            }

            // Export dữ liệu
            $data = DB::table($table)->get();
            $fileName = "{$table}_{$timestamp}.json";
            Storage::put("data/$folder/$fileName", $data->toJson(JSON_PRETTY_PRINT));

            $this->command->info("✅ Exported `$table` to `data/$folder/$fileName`");

            // === XÓA FILE CŨ THỨ 3 TRỞ ĐI ===
            $files = Storage::files("data/$folder");

            // Lọc file có tên dạng đúng cho bảng này
            $jsonFiles = collect($files)->filter(
                fn($file) =>
                str_contains($file, "{$table}_") && str_ends_with($file, '.json')
            )->sortDesc(); // Mới nhất lên đầu

            // Nếu có hơn 2 file thì xóa file cũ thứ 3 trở đi
            if ($jsonFiles->count() > 2) {
                $oldFiles = $jsonFiles->slice(2); // từ file thứ 3 trở đi
                foreach ($oldFiles as $oldFile) {
                    Storage::delete($oldFile);
                    $this->command->warn("🗑️ Deleted old file: $oldFile");
                }
            }
        }
    }
}
// php artisan db:seed --class=ExportSeeder