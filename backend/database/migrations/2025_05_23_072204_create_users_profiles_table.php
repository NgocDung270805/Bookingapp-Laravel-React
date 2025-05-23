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
        Schema::create('users_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('ward')->nullable()->comment('Phường/Xã');
            $table->string('country')->nullable()->default('Việt Nam');

            $table->date('birthday')->nullable()->comment('Ngày sinh');
            $table->enum('gender', ['nam', 'nu', 'khac'])->nullable()->comment('Giới tính');    

            $table->string('facebook_url')->nullable()->comment('Link Facebook');
            $table->string('zalo')->nullable()->comment('Số điện thoại hoặc link Zalo');
            $table->text('bio')->nullable()->comment('Mô tả bản thân, tiểu sử ngắn');
            $table->string('job_title')->nullable()->comment('Chức danh hoặc nghề nghiệp');

            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_profiles');
    }
};
