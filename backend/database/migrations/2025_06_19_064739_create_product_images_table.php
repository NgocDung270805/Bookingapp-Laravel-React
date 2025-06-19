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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            // Khóa ngoại tới bảng products (cho ảnh của sản phẩm chính)
            $table->foreignId('product_id')->nullable()->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            // Khóa ngoại tới bảng product_variants (tùy chọn, nếu bạn muốn album ảnh riêng cho từng biến thể)
            // Nếu bạn dùng cả hai, cần logic để đảm bảo chỉ một trong hai là NOT NULL
            $table->foreignId('product_variant_id')->nullable()->constrained('product_variants')->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('image_path'); // Đường dẫn tới ảnh
            $table->boolean('is_main_gallery_image')->default(false); // Đánh dấu ảnh chính trong album (nếu có)
            $table->integer('sort_order')->default(0); // Thứ tự hiển thị trong gallery
            $table->timestamps();

            // Ràng buộc để chỉ một trong hai FK là NOT NULL, nếu cần kiểm tra ở DB level
            // $table->fulltext(['product_id', 'product_variant_id']); // Không dùng fulltext cho FK
            // Hoặc sử dụng check constraint (MySQL 8+, MariaDB 10.2.1+)
            // $table->after('product_variant_id', function (Blueprint $table) {
            //    $table->unique(['product_id', 'product_variant_id']); // Nếu không muốn trùng lặp ảnh cho cùng 1 sản phẩm/biến thể
            //    $table->check('(product_id IS NOT NULL AND product_variant_id IS NULL) OR (product_id IS NULL AND product_variant_id IS NOT NULL)');
            // });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
