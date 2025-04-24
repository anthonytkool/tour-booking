<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Mail\BookingConfirmationMail;

class PaymentController extends Controller
{
    /**
     * แสดงหน้าชำระเงิน และสร้าง Stripe Checkout Session
     */
    public function checkout($id)
    {
        $booking = Booking::findOrFail($id);

        // ตั้งค่า Secret key จาก .env
        // Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe::setApiKey(config('services.stripe.secret'));

        // สร้าง Checkout Session
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'thb',
                    'product_data' => [
                        'name' => $booking->tour->name,
                    ],
                    'unit_amount' => $booking->tour->price * 100, // สตางค์
                ],
                'quantity' => $booking->number_of_people,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['id' => $booking->id]),
            'cancel_url'  => url()->previous(),
        ]);

        // Redirect ไปหน้าชำระเงินจริงของ Stripe
        return redirect($session->url);
    }

    /**
     * Callback เมื่อชำระเงินสำเร็จ
     */
    public function success($id)
    {
        $booking = Booking::findOrFail($id);

        // อัปเดตสถานะการจ่ายเงิน
        $booking->update(['payment_status' => 'paid']);

        // ส่งอีเมลยืนยันการจอง (ตอนนี้จ่ายเงินแล้ว)
        Mail::to($booking->customer_email)
            ->send(new BookingConfirmationMail($booking));

        // แสดงหน้า “ชำระเงินสำเร็จ”
        return view('payment-success', compact('booking'));
    }
}
