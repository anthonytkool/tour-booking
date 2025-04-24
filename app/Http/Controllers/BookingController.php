<?php
namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;        // ← เพิ่มบรรทัดนี้
use App\Mail\BookingConfirmationMail;

class BookingController extends Controller
{
    public function create($id)
    {
        $tour = Tour::findOrFail($id);
        return view('booking', compact('tour'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'travel_date'       => 'required|date',
            'number_of_people'  => 'required|integer|min:1',
            'customer_name'     => 'required|string',
            'customer_phone'    => 'required|string',
            'customer_email'    => 'required|email',
        ]);

        try {
            $booking = Booking::create([
                'tour_id'           => $id,
                'travel_date'       => $data['travel_date'],
                'number_of_people'  => $data['number_of_people'],
                'customer_name'     => $data['customer_name'],
                'customer_phone'    => $data['customer_phone'],
                'customer_email'    => $data['customer_email'],
                'payment_status'    => 'pending',
            ]);

            // ส่งอีเมลยืนยัน
            

          // แทนส่งอีเมล ให้ไปหน้าชำระเงิน
return redirect()->route('payment.checkout', ['id' => $booking->id]);

        } catch (\Exception $e) {
            Log::error("Booking error: " . $e->getMessage());   // ← เรียกใช้ Log facade ได้เลย
            return redirect()->route('booking.error', ['id' => $id])
                ->with('error_message', 'เกิดข้อผิดพลาด ไม่สามารถจองได้ กรุณาลองใหม่');
        }
    }

    public function success($id)
    {
        return view('booking-success');
    }

    public function error($id)
    {
        return view('booking-error');
    }
}
