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
            'guests' => 'required|integer|min:1|max:40',
            'table_type' => 'nullable|string|max:50',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Validate slot capacity (per date + hour prefix)
        $hourPrefix = substr($data['time'], 0, 2);
        $bookedGuests = (int) Booking::whereDate('date', $data['date'])
            ->where('time', 'like', $hourPrefix.':%')
            ->where('status', '!=', 'cancelled')
            ->sum('guests');

        $maxCapacity = (int) config('services.booking.max_guests_per_slot', 40);
        $remainingSeats = max(0, $maxCapacity - $bookedGuests);

        if (($bookedGuests + (int) $data['guests']) > $maxCapacity) {
            return response()->json([
                'success' => false,
                'message' => "Maaf, kapasitas kursi pada jam {$hourPrefix}:00 di tanggal tersebut sudah penuh (tersisa {$remainingSeats} kursi). Silakan pilih jam lain.",
                'remaining_seats' => $remainingSeats,
            ], 422);
        }

        $data['status'] = 'pending';
        $booking = Booking::create($data);

        return response()->json(['success' => true, 'booking' => $booking]);
    }

    public function index(Request $request)
    {
        $statusFilter = $request->query('status');

        $bookings = Booking::query()
            ->when($statusFilter && in_array($statusFilter, ['pending', 'confirmed', 'completed', 'cancelled']), function ($q) use ($statusFilter) {
                $q->where('status', $statusFilter);
            })
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->get();

        $statusCounts = [
            'all' => Booking::count(),
            'pending' => Booking::where('status', 'pending')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
        ];

        return view('admin.bookings.index', compact('bookings', 'statusFilter', 'statusCounts'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking->update([
            'status' => $data['status'],
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'status' => $booking->status,
                'status_label' => Booking::statusLabel($booking->status),
            ]);
        }

        return redirect()->route('admin.bookings.index')->with(
            'success',
            'Status reservasi '.$booking->name.' diperbarui menjadi '.Booking::statusLabel($booking->status).'.'
        );
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dihapus.');
    }
}
