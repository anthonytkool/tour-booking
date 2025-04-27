@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">จองทัวร์: {{ $tour->name }}</h1>

    <form action="{{ route('booking.store', ['tour' => $tour->id]) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- เลือกวันเดินทาง -->
        <div class="mb-4">
            <label for="travel_date" class="block text-gray-700 font-bold mb-2">เลือกวันเดินทาง:</label>
            <select name="travel_date" id="travel_date" required class="w-full border border-gray-300 rounded px-4 py-2">
                @foreach($tour->available_dates as $date)
                    <option value="{{ $date }}">
                        {{ \Carbon\Carbon::parse($date)->format('d F Y') }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- จำนวนผู้เดินทาง -->
        <div class="mb-4">
            <label for="number_of_people" class="block text-gray-700 font-bold mb-2">จำนวนผู้เดินทาง:</label>
            <input type="number" name="number_of_people" id="number_of_people" required min="1" 
                class="w-full border border-gray-300 rounded px-4 py-2" placeholder="ระบุจำนวนผู้เดินทาง">
        </div>

        <!-- ปุ่ม Submit -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                ยืนยันการจอง
            </button>
        </div>
    </form>

    <div class="mt-4">
        <a href="{{ route('tours.index') }}" class="text-blue-600 hover:underline">← กลับหน้ารายการทัวร์</a>
    </div>
</div>
@endsection
