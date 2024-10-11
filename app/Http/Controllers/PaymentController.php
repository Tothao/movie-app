<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showtime;
use App\Models\Seat;

class PaymentController extends Controller
{
    public function showPayment(Request $request)
    {
        $showtime = Showtime::with(['movie', 'cinemaRoom'])->findOrFail($request->showtime_id);
        $selectedSeatIds = $request->input('selected_seats');
        $selectedSeats = Seat::whereIn('id', $selectedSeatIds)->get();

        $totalAmount = $selectedSeats->sum(function ($seat) use ($showtime) {
            return $seat->type === 'vip' ? $showtime->price * 1.5 : $showtime->price;
        });

        $seatNumbers = $selectedSeats->pluck('seat_number')->toArray();
        

        return view('client.pages.payment', compact('showtime', 'selectedSeats', 'selectedSeatIds', 'seatNumbers', 'totalAmount'));
    }
}
