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
        Schema::create('product_attribute_value_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->name('fk_pavc_prod'); 
            // fk_pavc_prod khóa ngoại đến table products
            $table->foreignId('product_attribute_value_id')->constrained('product_attribute_values')->onDelete('cascade')->name('fk_pavc_pav'); 
            // fk_pavc_pav khóa ngoại đến product_attribute_values

            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('discount_price', 15, 2)->nullable(); 
            $table->integer('discount_percent')->nullable();       
            $table->integer('quantity')->default(0);            
            $table->string('img_path')->nullable();        
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();

            $table->unique(['product_id', 'product_attribute_value_id'], 'prod_attr_val_config_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_attr_val_configs'); // Xóa bảng với tên mới
    }
};