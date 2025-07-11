<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id(); // Trường ID tự tăng (BIGINT UNSIGNED)
            $table->tinyInteger('type')->comment('1: Logo, 2: Ảnh nền footer, 3: Banner trang chủ, 4: Ảnh slider, 5: Banner sản phẩm'); // TINYINT cho loại banner
            $table->string('title', 255)->nullable()->comment('Tên hoặc mô tả ngắn gọn của banner'); // VARCHAR(255) cho tiêu đề
            $table->text('image_path')->comment('Đường dẫn lưu trữ ảnh banner'); // TEXT cho đường dẫn ảnh (có thể dài)
            $table->text('link')->nullable()->comment('URL liên kết khi nhấp vào banner (tùy chọn)'); // TEXT NULL cho link
            $table->boolean('is_active')->default(true)->comment('Trạng thái hoạt động của banner (ẩn/hiện)'); // BOOLEAN (tinyint(1)) mặc định true
            $table->timestamps(); // created_at và updated_at (TIMESTAMP)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
