@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $tour->name }}</h1>

    <p class="text-gray-700 text-lg mb-4">
        ราคา: <span class="font-semibold">{{ number_format($tour->price, 0) }} บาท</span>
    </p>

    <p class="text-gray-600 mb-6">
        รายละเอียดทัวร์อื่น ๆ ใส่ตรงนี้ เช่น กำหนดการ, จุดเด่น, ฯลฯ
    </p>

    <a href="{{ url('/tours') }}" class="text-blue-600 hover:underline">← กลับหน้ารายการทัวร์</a>
</div>
@endsection
