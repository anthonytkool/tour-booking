<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>ชำระเงินสำเร็จ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5 text-center">
    <h1 class="text-success">✅ ชำระเงินสำเร็จแล้ว!</h1>
    <p>ขอบคุณที่ชำระเงินสำหรับการจองของคุณ รหัสการจองคือ: <strong>{{ $booking->id }}</strong></p>
    <p>ยอดที่ชำระ: <strong>{{ number_format($booking->tour->price * $booking->number_of_people) }} บาท</strong></p>
    <p>อีเมลยืนยันการจองได้ถูกส่งไปยัง: <strong>{{ $booking->customer_email }}</strong></p>
    <a href="{{ url('/tours') }}" class="btn btn-primary">กลับไปดูทัวร์อื่น ๆ</a>
  </div>
</body>
</html>
