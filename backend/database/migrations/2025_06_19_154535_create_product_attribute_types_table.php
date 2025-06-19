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
        Schema::create('product_attribute_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Tên loại thuộc tính (e.g., "Màu sắc", "Động cơ")
            $table->string('slug')->unique();
            $table->string('display_type')->default('text'); // Gợi ý cách hiển thị (e.g., 'text', 'color_picker', 'dropdown')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_types');
    }
};
