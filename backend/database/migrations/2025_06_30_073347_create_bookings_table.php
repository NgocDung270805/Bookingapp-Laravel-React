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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            // Thêm các trường cần thiết cho việc đặt lịch
            $table->date('booking_date'); // Ngày đặt lịch
            $table->time('booking_time')->nullable(); // Giờ đặt lịch (nếu có)
            $table->string('status')->default('pending'); // pending, confirmed, cancelled, completed
            $table->text('notes')->nullable(); // Ghi chú thêm
            $table->decimal('total_price', 15, 2)->nullable(); // Tổng giá trị đơn đặt lịch
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
