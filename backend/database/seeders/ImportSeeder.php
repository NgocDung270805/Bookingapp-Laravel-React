<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Vô hiệu hóa kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Định nghĩa thứ tự các bảng để truncate (bảng con trước, bảng cha sau)
        // Đây là thứ tự đảo ngược lại so với mối quan hệ khóa ngoại
        $truncateOrder = [
            // Các bảng phụ thuộc Level 3 (truncate trước tiên)
            'product_variant_attribute_value',
            'product_attribute_value_configs',

            // Các bảng phụ thuộc Level 2
            'product_variants',
            'product_tag',
            'product_images',
            'product_favorites',
            'product_category',
            'category_tag',
            'comments',
            'bookings',

            // Các bảng phụ thuộc Level 1
            'model_has_roles',
            'model_has_permissions',
            'role_has_permissions',
            'product_attribute_values',
            'products',
            'user_details',
            'users_profiles',
            'personal_access_tokens',

            // Các bảng cốt lõi (truncate sau cùng trong nhóm ứng dụng)
            'banners',
            'product_attribute_types',
            'tags',
            'categories',
            'roles',
            'permissions',
            'users',

            // Các bảng hệ thống/framework (thường không có khóa ngoại tham chiếu từ các bảng ứng dụng chính)
            'cache',
            'cache_locks',
            'failed_jobs',
            'jobs',
            'job_batches',
            'migrations',
            'sessions', // Bảng này được thêm vào truncateOrder nếu nó tồn tại trong DB của bạn
            'password_reset_tokens', // Bảng này được bỏ qua khi import nhưng cần truncate nếu tồn tại
        ];

        // 2. Truncate tất cả các bảng theo đúng thứ tự
        foreach ($truncateOrder as $table) {
            // Kiểm tra nếu bảng tồn tại trước khi truncate để tránh lỗi nếu một bảng không có
            if (DB::getSchemaBuilder()->hasTable($table)) {
                DB::table($table)->truncate();
                if (isset($this->command)) {
                    $this->command->info("🗑️ Truncated table: `$table`");
                } else {
                    echo "🗑️ Truncated table: `$table`\n";
                }
            }
        }

        // 3. Định nghĩa lại mảng $tables cho việc import dữ liệu
        // Bây giờ bao gồm tất cả các bảng bạn muốn import, theo thứ tự hợp lý
        $tablesToImport = [
            // Các bảng cốt lõi (import trước tiên)
            'users' => 'Users',
            'permissions' => 'Permissions',
            'roles' => 'Roles',
            'categories' => 'Categories',
            'tags' => 'Tags',
            'product_attribute_types' => 'Product Attribute Types',
            'banners' => 'Banners',

            // Các bảng phụ thuộc Level 1
            'personal_access_tokens' => 'Personal Access Tokens',
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
            'product_category' => 'Product Category',
            'product_favorites' => 'Product Favorites',
            'product_images' => 'Product Images',
            'product_tag' => 'Product Tag',
            'product_variants' => 'Product Variants',

            // Các bảng phụ thuộc Level 3
            'product_attribute_value_configs' => 'Product Attribute Value Configs',
            'product_variant_attribute_value' => 'Product Variant Attribute Value',
        ];


        // 4. Import dữ liệu vào các bảng
        foreach ($tablesToImport as $table => $folder) {
            if (!Storage::exists("data/$folder")) {
                if (isset($this->command)) {
                    $this->command->warn("⚠️ Folder `data/$folder` not found.");
                } else {
                    echo "⚠️ Folder `data/$folder` not found.\n";
                }
                continue;
            }

            $files = Storage::files("data/$folder");

            $jsonFiles = collect($files)->filter(
                fn($file) =>
                str_contains($file, "{$table}_") && str_ends_with($file, '.json')
            )->sortDesc()->values();

            if ($jsonFiles->isNotEmpty()) {
                $latestFile = $jsonFiles->first();
                $json = Storage::get($latestFile);
                $data = json_decode($json, true);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    if (isset($this->command)) {
                        $this->command->error("Error decoding JSON from file: $latestFile. Error: " . json_last_error_msg());
                    } else {
                        echo "Error decoding JSON from file: $latestFile. Error: " . json_last_error_msg() . "\n";
                    }
                    continue;
                }

                if (!is_array($data)) {
                    if (isset($this->command)) {
                        $this->command->error("Invalid data structure in JSON file: $latestFile. Expected an array.");
                    } else {
                        echo "Invalid data structure in JSON file: $latestFile. Expected an array.\n";
                    }
                    continue;
                }

                // Không cần truncate ở đây nữa vì đã truncate ở trên
                DB::table($table)->insert($data);

                if (isset($this->command)) {
                    $this->command->info("✅ Imported `$table` from `$latestFile`");
                } else {
                    echo "✅ Imported `$table` from `$latestFile`\n";
                }
            } else {
                if (isset($this->command)) {
                    $this->command->warn("⚠️ No JSON file found for `$table` in `data/$folder`");
                } else {
                    echo "⚠️ No JSON file found for `$table` in `data/$folder`\n";
                }
            }
        }

        // 5. Bật lại kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
// php artisan db:seed --class=ImportSeeder
