<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Tour $tour)
    {
        return view('booking.form', compact('tour'));
    }

    public function store(Request $request, Tour $tour)
    {
        // Validate ข้อมูลที่รับมา
        $request->validate([
            'travel_date' => 'required|date',
            'number_of_people' => 'required|integer|min:1',
        ]);

        // สร้าง Booking ใหม่
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->tour_id = $tour->id;
        $booking->travel_date = $request->input('travel_date');
        $booking->number_of_people = $request->input('number_of_people');
        $booking->status = 'pending'; // สถานะเริ่มต้น "รอยืนยัน" หรือจะเปลี่ยนตามที่ต้องการได้
        $booking->save();

        return redirect()->route('booking.success', ['id' => $booking->id]);
    }

    public function success($id)
    {
        return view('booking.success', ['booking_id' => $id]);
    }

    public function error($id)
    {
        return view('booking.error', ['booking_id' => $id]);
    }
}
