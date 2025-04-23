<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($id)
    {
        $tour = Tour::findOrFail($id);
        return view('booking', compact('tour'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'travel_date' => 'required|date',
            'number_of_people' => 'required|integer|min:1',
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_email' => 'required|email',
        ]);

        Booking::create([
            'tour_id' => $id,
            'travel_date' => $request->travel_date,
            'number_of_people' => $request->number_of_people,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'payment_status' => 'pending', // ยังไม่ได้จ่าย
        ]);

        return 'บันทึกการจองเรียบร้อยแล้ว!';
    }
}
