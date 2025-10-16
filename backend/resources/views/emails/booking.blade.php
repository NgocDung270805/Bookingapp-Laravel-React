{{-- <h2>Chào {{ $user->name }}</h2>
<p>Cảm ơn bạn đã đăng ký!</p>
<p>Đây là thông tin đặt chỗ của bạn:</p>
<ul>
    <li><strong>Ngày đặt chỗ:</strong> {{ $booking->date }}</li>
    <li><strong>Giờ đặt chỗ:</strong> {{ $booking->time }}</li>
    <li><strong>Số người:</strong> {{ $booking->number_of_people }}</li>
    <li><strong>Ghi chú:</strong> {{ $booking->notes ?? 'Không có' }}</li>
</ul> --}}

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
            <h3>Xin chào {{ $user->name }},</h3>
            <p>Cảm ơn bạn đã đặt lịch tại dịch vụ của chúng tôi. Dưới đây là chi tiết đặt lịch của bạn:</p>

            <div class="booking-details">
                <p><strong>Mã đặt lịch:</strong> #{{ $booking->id }}</p>
                <p><strong>Trạng thái:</strong> 
                    <span class="status status-{{ $booking->status }}">
                        @php
                            $statusLabels = [
                                'pending' => 'Đang chờ xử lý',
                                'confirmed' => 'Đã xác nhận',
                                'canceled' => 'Đã hủy',
                                'completed' => 'Hoàn thành'
                            ];
                        @endphp
                        {{ $statusLabels[$booking->status] ?? ucfirst($booking->status) }}
                    </span>
                </p>
                <p><strong>Thời gian:</strong> {{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }} 
                lúc {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i:s') }}</p>
                <p><strong>Địa chỉ:</strong>  {{ $booking->address_line ?? 'N/A' }}, {{ $booking->ward ?? 'N/A' }},  {{ $booking->district ?? 'N/A' }}, {{ $booking->city ?? 'N/A' }}</p>
                <p><strong>Dịch vụ:</strong> Đặt lịch xem xe, lái thử xe - Check xe</p>
                <p><strong>Nhân viên phụ trách:</strong> Cao Văn Đại - 𝟎𝟑𝟑𝟒.𝟑𝟔𝟔.𝟗𝟕𝟐</p>
                <p><strong>Ghi chú:</strong> {{ $booking->notes ?? 'N/A' }}</p>
                <p><strong>Thời gian đặt:</strong> 
                    {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }} 
                    lúc {{ \Carbon\Carbon::parse($booking->time)->format('H:i:s') }}
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
</html>