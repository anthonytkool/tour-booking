<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>จองสำเร็จ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5 text-center">
        <h1 class="text-success">🎉 จองทัวร์สำเร็จแล้ว!</h1>
        <p>ขอบคุณที่จองกับเรา รหัสการจองของคุณคือ: <strong>{{ session('booking_id') }}</strong></p>
        <a href="{{ url('/tours') }}" class="btn btn-primary">กลับไปดูทัวร์อื่น ๆ</a>
    </div>
</body>

</html>