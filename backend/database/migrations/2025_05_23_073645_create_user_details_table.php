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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('Khóa ngoại liên kết với bảng users');

            $table->string('id_number')->nullable()->comment('Số CCCD/CMND');
            $table->date('id_issued_date')->nullable()->comment('Ngày cấp CCCD/CMND');
            $table->string('id_issued_place')->nullable()->comment('Nơi cấp CCCD/CMND');
            $table->string('marital_status')->nullable()->comment('Tình trạng hôn nhân: single, married');
            $table->string('nationality')->nullable()->comment('Quốc tịch');

            $table->string('instagram_url')->nullable()->comment('Link Instagram');
            $table->string('linkedin_url')->nullable()->comment('Link LinkedIn');
            $table->string('tiktok_url')->nullable()->comment('Link TikTok');

            $table->string('company_name')->nullable()->comment('Tên công ty đang làm việc');
            $table->string('company_address')->nullable()->comment('Địa chỉ công ty');
            $table->string('working_status')->nullable()->comment('Tình trạng việc làm: employed, looking, freelancer');

            $table->text('shipping_note')->nullable()->comment('Ghi chú giao hàng');
            $table->string('preferred_payment')->nullable()->comment('Phương thức thanh toán ưa thích');
            $table->integer('points')->default(0)->comment('Điểm tích lũy của người dùng');

            $table->string('slug')->nullable()->comment('Slug URL cá nhân hóa hồ sơ');
            $table->string('status')->default('active')->comment('Trạng thái tài khoản: active, inactive, suspended');
            $table->timestamp('last_login_at')->nullable()->comment('Lần đăng nhập gần nhất');
            $table->text('device_info')->nullable()->comment('Thông tin thiết bị hoặc IP khi đăng nhập');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
