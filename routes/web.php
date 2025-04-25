<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

// เส้นทางสาธารณะ
Route::get('/', function () {
    return view('home');
});
Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/{id}', [TourController::class, 'show']);

// พื้นที่ที่ต้องล็อกอินก่อน
Route::middleware('auth')->group(function () {
    // ฟอร์มจอง & บันทึกการจอง
    Route::get('/booking/{id}',  [BookingController::class, 'create'])
         ->name('booking.create');
    Route::post('/booking/{id}', [BookingController::class, 'store'])
         ->name('booking.store');

    // หน้าจองสำเร็จ/ล้มเหลว
    Route::get('/booking/{id}/success', [BookingController::class, 'success'])
         ->name('booking.success');
    Route::get('/booking/{id}/error',   [BookingController::class, 'error'])
         ->name('booking.error');

    // ระบบชำระเงิน
    Route::get('/payment/{id}',        [PaymentController::class, 'checkout'])
         ->name('payment.checkout');
    Route::get('/payment/success/{id}',[PaymentController::class, 'success'])
         ->name('payment.success');
});

// เส้นทางล็อกอิน/สมัครของ Breeze
require __DIR__.'/auth.php';
