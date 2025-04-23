<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController; // << อยู่ตรงนี้ด้านบน

use App\Http\Controllers\BookingController;




Route::get('/', function () {
    return view('home');
});

Route::get('/tours', [TourController::class, 'index']);

Route::get('/booking/{id}', [BookingController::class, 'create']);
Route::post('/booking/{id}', [BookingController::class, 'store']);
