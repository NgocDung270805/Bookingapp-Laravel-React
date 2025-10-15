<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function changeStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $newStatus = $request->status;
        
        if (!in_array($newStatus, ['pending', 'confirmed', 'canceled', 'completed'])) {
            return response()->json(['error' => 'Invalid status'], 400);
        }

        $booking->update([
            'status' => $newStatus,
            'completed_at' => $newStatus === 'completed' ? now() : null
        ]);

        return response()->json([
            'success' => 'Booking status updated successfully',
            'booking' => $booking
        ]);
    }

    public function index(Request $request)
    {
        $query = Booking::with(['user']);

        // Filters
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->date) {
            $query->whereDate('booking_date', $request->date);
        }

        $bookings = $query->orderBy('booking_date', 'desc')->get();
        // dd($bookings);
        return view('apps.booking.index', compact('bookings'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json(['booking' => $booking]);
    }
}
