<?php

namespace App\Http\Controllers\Api\ProductActions;

use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Create a new booking for a product.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'nullable|date_format:H:i',
            'notes' => 'nullable|string|max:1000',
            'total_price' => 'nullable|numeric|min:0', // Nếu giá trị này được gửi từ frontend
        ]);

        $booking = $product->bookings()->create([
            'user_id' => Auth::id(),
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'notes' => $request->notes,
            'total_price' => $request->total_price,
            'status' => 'pending', // Trạng thái mặc định khi tạo
        ]);

        return response()->json(['message' => 'Đặt lịch thành công!', 'booking' => $booking], 201);
    }

    /**
     * Display a listing of bookings for the authenticated user.
     */
    public function index()
    {
        $user = Auth::user();
        $bookings = $user->bookings()->with('product')->orderBy('booking_date', 'desc')->get();
        return response()->json(['bookings' => $bookings]);
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        // Đảm bảo chỉ người dùng sở hữu hoặc admin mới có thể xem booking
        if ($booking->user_id !== Auth::id() && !Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $booking->load('product');
        return response()->json(['booking' => $booking]);
    }

    /**
     * Update the specified booking (e.g., change notes, cancel).
     */
    public function update(Request $request, Booking $booking)
    {
        // Đảm bảo chỉ người dùng sở hữu hoặc admin mới có thể cập nhật
        if ($booking->user_id !== Auth::id() && !Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'booking_date' => 'nullable|date|after_or_equal:today',
            'booking_time' => 'nullable|date_format:H:i',
            'status' => 'nullable|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string|max:1000',
            'total_price' => 'nullable|numeric|min:0',
        ]);

        $booking->update($request->all());

        return response()->json(['message' => 'Cập nhật đặt lịch thành công!', 'booking' => $booking]);
    }

    /**
     * Remove the specified booking.
     */
    public function destroy(Booking $booking)
    {
        // Đảm bảo chỉ người dùng sở hữu hoặc admin mới có thể xóa
        if ($booking->user_id !== Auth::id() && !Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $booking->delete();
        return response()->json(['message' => 'Đặt lịch đã được hủy thành công!']);
    }
}
