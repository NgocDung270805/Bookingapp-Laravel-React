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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Tên class notification (VD: App\Notifications\OrderConfirmed)
            $table->morphs('notifiable'); // Gồm notifiable_id + notifiable_type (người nhận)

            // Thông tin hiển thị & trạng thái
            $table->string('title')->nullable()->comment('Tiêu đề thông báo');
            $table->text('message')->nullable()->comment('Nội dung ngắn của thông báo');
            $table->tinyInteger('priority')->default(2)->comment('1-Quan trọng, 2-Bình thường, 3-Thấp');
            $table->boolean('is_active')->default(true)->comment('Trạng thái hoạt động');
            $table->boolean('is_popup')->default(false)->comment('Hiển thị dạng popup');
            $table->boolean('is_displayed')->default(true)->comment('Hiển thị trong danh sách');

            // Đối tượng & kênh gửi
            $table->enum('audience', ['admin', 'user', 'both'])->default('user')->comment('Đối tượng nhận thông báo');
            $table->enum('channel', ['database', 'mail', 'push', 'broadcast', 'system'])
                ->default('database')->comment('Kênh gửi thông báo');

            // Thông tin bổ sung
            $table->string('category')->nullable()->comment('Loại thông báo: system, order, promo...');
            $table->string('action_url')->nullable()->comment('Link chuyển hướng khi click');
            $table->uuid('sent_by')->nullable()->comment('Người gửi (VD: admin)');
            $table->timestamp('expires_at')->nullable()->comment('Ngày hết hạn thông báo');
            $table->boolean('is_sent')->default(false)->comment('Đã gửi qua mail/push chưa');

            // Nội dung & trạng thái đọc
            $table->text('data')->comment('Dữ liệu thông báo (JSON)');
            $table->timestamp('read_at')->nullable()->comment('Thời điểm đọc');

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['notifiable_type', 'notifiable_id'], 'notifications_notifiable_index');
            $table->index(['is_active', 'audience', 'priority'], 'notifications_filter_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
