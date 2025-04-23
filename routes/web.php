<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController; // << อยู่ตรงนี้ด้านบน

Route::get('/', function () {
    return view('home');
});

Route::get('/tours', [TourController::class, 'index']);
