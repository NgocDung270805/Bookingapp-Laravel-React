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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('variant_name'); // Ví dụ: "Màu đỏ", "Kích thước L"
            $table->string('sku')->unique()->nullable(); // Mã SKU duy nhất cho từng biến thể
            $table->enum('pricing_type', ['public_price', 'request_quote'])->default('public_price');
            // Các thuộc tính riêng của từng biến thể, di chuyển từ bảng products
            $table->decimal('price', 15, 2)->nullable(); // Giá của biến thể này
            $table->decimal('discount_price', 15, 2)->nullable(); // Giá khuyến mãi riêng của biến thể
            $table->integer('discount_percent')->nullable(); // Phần trăm giảm giá riêng của biến thể
            $table->integer('quantity')->default(0); // Số lượng tồn kho của biến thể này
            $table->string('img')->nullable(); // Hình ảnh riêng của biến thể
            $table->boolean('status')->default(true); // Trạng thái của biến thể (active/inactive)
            $table->boolean('is_featured')->default(false); // Biến thể này có nổi bật không
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
