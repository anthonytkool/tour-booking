@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8 text-center">
    <h1 class="text-3xl font-bold text-green-600 mb-6">🎉 จองทัวร์สำเร็จ!</h1>

    <p class="text-lg text-gray-700 mb-4">
        ขอบคุณสำหรับการจอง รหัสการจองของคุณคือ <strong>#{{ $booking_id }}</strong>
    </p>

    <p class="text-gray-600 mb-6">
        กรุณารอการติดต่อกลับจากเจ้าหน้าที่ เพื่อยืนยันการจอง และขั้นตอนชำระเงิน
    </p>

    <a href="{{ route('tours.index') }}" 
       class="inline-block bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
        กลับไปดูแพ็กเกจทัวร์
    </a>
</div>
@endsection
