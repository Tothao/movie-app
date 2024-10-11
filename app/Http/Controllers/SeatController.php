<?php

namespace App\Http\Controllers;
use App\Models\Seat;
use App\Models\Booking;
use App\Models\Showtime;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function seatSelection($showtime_id)
{
    $showtime = Showtime::findOrFail($showtime_id);
    $seats = Seat::where('cinema_room_id', $showtime->cinema_room_id)->get();

    $bookedSeats = Booking::where('showtime_id', $showtime_id)->pluck('seat_id')->toArray();

    $seats = $seats->map(function ($seat) use ($bookedSeats) {
        $seat->is_available = !in_array($seat->id, $bookedSeats);
        return $seat;
    });

    $seatsByRow = $seats->groupBy('row');
    // Ensure each seat has a seat_number
    $seatsByRow = $seatsByRow->map(function ($row) {
        return $row->map(function ($seat) {
            $seat->seat_number = $seat->row . $seat->column;
            return $seat;
        });
    });

    return view('client.pages.seat-selection', [
        'showtime' => $showtime,
        'seatsByRow' => $seatsByRow,
        'selectedSeatIds' => [], // Nếu không có ghế nào được chọn ngay từ đầu
    ]);
}

    
}
