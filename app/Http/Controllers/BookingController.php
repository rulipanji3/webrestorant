<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'date' => 'required|date',
            'time' => 'required|string|max:10',
            'guests' => 'required|integer|min:1',
            'table_type' => 'nullable|string|max:50',
            'notes' => 'nullable|string|max:1000',
        ]);

        $booking = Booking::create($data);

        return response()->json(['success' => true, 'booking' => $booking]);
    }

    public function index()
    {
        $bookings = Booking::orderBy('date', 'desc')->orderBy('time', 'desc')->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dihapus.');
    }
}
