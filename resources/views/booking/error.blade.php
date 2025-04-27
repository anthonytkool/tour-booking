@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8 text-center">
    <h1 class="text-3xl font-bold text-red-600 mb-6">❌ เกิดข้อผิดพลาดในการจอง</h1>

    <p class="text-lg text-gray-700 mb-4">
        ขออภัย! เกิดปัญหาระหว่างการจอง รหัสการจอง <strong>#{{ $booking_id }}</strong>
    </p>

    <p class="text-gray-600 mb-6">
        กรุณาลองใหม่อีกครั้ง หรือ ติดต่อเจ้าหน้าที่เพื่อความช่วยเหลือ
    </p>

    <a href="{{ route('tours.index') }}" 
       class="inline-block bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
        กลับไปหน้าหลัก
    </a>
</div>
@endsection
