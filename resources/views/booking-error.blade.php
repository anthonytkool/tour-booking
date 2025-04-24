<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เกิดข้อผิดพลาด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5 text-center">
        <h1 class="text-danger">❌ ขอโทษครับ เกิดข้อผิดพลาด</h1>
        <p>{{ session('error_message', 'ไม่สามารถดำเนินการได้ กรุณาลองใหม่อีกครั้ง') }}</p>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">กลับไปลองใหม่</a>
    </div>
</body>

</html>