@component('mail::message')
# การยืนยันการจองทัวร์

เรียน คุณ{{ $booking->customer_name }},

ขอบคุณที่จองทัวร์ **{{ $tour->name }}** กับเรา
รายละเอียดการจองของคุณ:

- **รหัสการจอง:** {{ $booking->id }}
- **วันที่เดินทาง:** {{ $booking->travel_date }}
- **จำนวนผู้เดินทาง:** {{ $booking->number_of_people }} คน
- **ราคา/คน:** {{ number_format($tour->price) }} บาท
- **ราคารวม:** {{ number_format($tour->price * $booking->number_of_people) }} บาท

@component('mail::button', ['url' => url('/tours')])
ดูรายการทัวร์เพิ่มเติม
@endcomponent

ขอบคุณที่ใช้บริการ
{{ config('app.name') }}
@endcomponent