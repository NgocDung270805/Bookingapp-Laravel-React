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
        Schema::create('product_variant_attribute_value', function (Blueprint $table) {
            $table->unsignedBigInteger('product_variant_id');
            $table->unsignedBigInteger('product_attribute_value_id');
            
            $table->primary(['product_variant_id', 'product_attribute_value_id'], 'pvav_pk');// 'pvav_pk' rút gọn từ 'product_variant_attribute_value_primary_key'.

            
            $table->foreign('product_variant_id', 'fk_pvav_pv')// 'fk_pvav_pv' rút gọn từ 'foreign_key_product_variant_attribute_value_product_variant'.
                ->references('id')->on('product_variants')
                ->onDelete('cascade');

            
            $table->foreign('product_attribute_value_id', 'fk_pvav_pav')// 'fk_pvav_pav' rút gọn từ 'foreign_key_product_variant_attribute_value_product_attribute_value'.
                ->references('id')->on('product_attribute_values')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant_attribute_value'); // Xóa bảng với tên mới
    }
};
