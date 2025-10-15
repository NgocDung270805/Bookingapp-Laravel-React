

<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #4CAF50; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 0 0 5px 5px; }
        .booking-details { background: white; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .footer { text-align: center; margin-top: 20px; color: #666; font-size: 0.9em; }
        .status { display: inline-block; padding: 5px 10px; border-radius: 3px; font-weight: bold; }
        .status-pending { background: #ffd700; color: #000; }
        .button { display: inline-block; padding: 10px 20px; background: #4CAF50; color: white; text-decoration: none; border-radius: 5px; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Xác Nhận Đặt Lịch</h2>
        </div>
        
        <div class="content">
            <h3>Xin chào <?php echo e($user->name); ?>,</h3>
            <p>Cảm ơn bạn đã đặt lịch tại dịch vụ của chúng tôi. Dưới đây là chi tiết đặt lịch của bạn:</p>

            <div class="booking-details">
                <p><strong>Mã đặt lịch:</strong> #<?php echo e($booking->id); ?></p>
                <p><strong>Trạng thái:</strong> 
                    <span class="status status-<?php echo e($booking->status); ?>">
                        <?php
                            $statusLabels = [
                                'pending' => 'Đang chờ xử lý',
                                'confirmed' => 'Đã xác nhận',
                                'canceled' => 'Đã hủy',
                                'completed' => 'Hoàn thành'
                            ];
                        ?>
                        <?php echo e($statusLabels[$booking->status] ?? ucfirst($booking->status)); ?>

                    </span>
                </p>
                <p><strong>Thời gian:</strong> <?php echo e(\Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y')); ?> 
                lúc <?php echo e(\Carbon\Carbon::parse($booking->booking_time)->format('H:i:s')); ?></p>
                <p><strong>Dịch vụ:</strong> Đặt lịch xem xe, lái thử xe - Check xe</p>
                <p><strong>Nhân viên phụ trách:</strong> Cao Văn Đại - 𝟎𝟑𝟑𝟒.𝟑𝟔𝟔.𝟗𝟕𝟐</p>
                <p><strong>Ghi chú:</strong> <?php echo e($booking->notes ?? 'N/A'); ?></p>
                <p><strong>Thời gian đặt:</strong> 
                    <?php echo e(\Carbon\Carbon::parse($booking->date)->format('d/m/Y')); ?> 
                    lúc <?php echo e(\Carbon\Carbon::parse($booking->time)->format('H:i:s')); ?>

                </p>
            </div>

            <p>Nếu bạn cần thay đổi lịch hẹn, vui lòng liên hệ với chúng tôi trước 24 giờ.</p>
            <div class="footer">
                <p>Trân trọng,<br>Đội ngũ chăm sóc khách hàng</p>
                <p>Hotline: 𝟎𝟑𝟑𝟒.𝟑𝟔𝟔.𝟗𝟕𝟐 | Email: phungdung2708@gmail.com</p>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\laragon\www\BookingApp–Laravel-React\backend\resources\views/emails/booking.blade.php ENDPATH**/ ?>