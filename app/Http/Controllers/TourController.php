<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        // ข้อมูลจำลอง (dummy data)
        $tours = [
            ['name' => 'ทัวร์เชียงใหม่ 5 วัน 4 คืน', 'price' => 8900],
            ['name' => 'เที่ยวใต้ สัมผัสทะเลอันดามัน', 'price' => 12900],
            ['name' => 'อีสานวัฒนธรรม 7 วัน', 'price' => 10200],
        ];

        return view('tours', compact('tours'));
    }
}
