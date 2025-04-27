@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <!-- ชื่อทัวร์ -->
    <h1 class="text-3xl font-bold mb-4">{{ $tour->name }}</h1>

    <!-- ราคา -->
    <p class="text-gray-700 text-lg mb-4">
        ราคา: <span class="font-semibold">{{ number_format($tour->price, 0) }} บาท</span>
    </p>

    <!-- รายละเอียด -->
    <p class="text-gray-600 mb-6">
        รายละเอียดทัวร์อื่น ๆ ใส่ตรงนี้ เช่น กำหนดการ, จุดเด่น, ฯลฯ
    </p>

    <!-- ลิงก์กลับหน้ารายการทัวร์ -->
    <a href="{{ url('/tours') }}" class="text-blue-600 hover:underline">← กลับหน้ารายการทัวร์</a>

    <!-- ปุ่มจองทัวร์ -->
    <div class="mt-8">
        @auth
            <a href="{{ route('booking.form', ['tour' => $tour->id]) }}"
               class="block w-full text-center bg-gray-900 text-amber-400 font-bold text-lg px-6 py-3 rounded">
               🔖 Book This Tour 🚀
            </a>
        @else
            <a href="{{ route('login') }}"
               class="block w-full text-center bg-white border border-sky-500 text-sky-500 font-bold text-lg px-6 py-3 rounded">
               🔒 Login to Book Tour
            </a>
        @endauth
    </div>
</div>
@endsection
