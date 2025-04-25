<?php
namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::all(); // ดึงข้อมูลทั้งหมดจากตาราง tours
        return view('tours.index', compact('tours')); // ส่งข้อมูลไปหน้า view
    }

    public function show($id)
    {
        $tour = Tour::findOrFail($id); // ดึง tour ที่ตรงกับ id
        return view('tours.show', compact('tour')); // ส่งข้อมูลไปหน้า view
    }
}
