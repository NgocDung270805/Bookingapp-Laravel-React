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
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_type_id')->constrained('product_attribute_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('value'); // Giá trị cụ thể (e.g., "Xanh", "Tự động")
            $table->json('metadata')->nullable(); // Ví dụ: {"hex_code": "#FF0000"} cho màu sắc
            $table->timestamps();

            $table->unique(['attribute_type_id', 'value']); // Đảm bảo giá trị là duy nhất trong một loại thuộc tính
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_values');
    }
};
