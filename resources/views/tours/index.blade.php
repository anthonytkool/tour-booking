@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">แพ็กเกจทัวร์ทั้งหมด</h1>

    @if($tours->isEmpty())
        <p class="text-gray-600">ยังไม่มีรายการทัวร์ในขณะนี้</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tours as $tour)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $tour->name }}</h2>
                        <p class="text-gray-700 mb-2">ราคา: {{ number_format($tour->price, 0) }} บาท</p>
                        <a href="{{ route('tours.show', $tour->id) }}" class="inline-block mt-2 text-blue-600 hover:underline">ดูรายละเอียด</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
