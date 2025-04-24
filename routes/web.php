<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('home');
});
Route::get('/tours', [TourController::class, 'index']);
Route::get('/booking/{id}', [BookingController::class, 'create']);
Route::post('/booking/{id}', [BookingController::class, 'store']);

// เพิ่มสองบรรทัดนี้ตรงท้ายไฟล์
Route::get('/booking/{id}/success', [BookingController::class, 'success'])
    ->name('booking.success');
Route::get('/booking/{id}/error',   [BookingController::class, 'error'])
    ->name('booking.error');

    // หน้าเลือกชำระเงิน
Route::get('/payment/{id}', [PaymentController::class, 'checkout'])
->name('payment.checkout');

// หน้า callback เมื่อชำระเงินสำเร็จ (redirect กลับมา)
Route::get('/payment/success/{id}', [PaymentController::class, 'success'])
->name('payment.success');