<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())->get();
        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'booking_date' => 'required|date|after:today',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'room_id' => $request->room_id,
            'booking_date' => $request->booking_date,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Room booked successfully!');
    }
}
