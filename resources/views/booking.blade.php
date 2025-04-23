<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>จองทัวร์ - {{ $tour->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h1 class="mb-4">จองทัวร์: {{ $tour->name }}</h1>

        <form method="POST" action="/booking/{{ $tour->id }}">
            @csrf

            <div class="mb-3">
                <label for="travel_date" class="form-label">วันที่เดินทาง</label>
                <input type="date" class="form-control" name="travel_date" required>
            </div>

            <div class="mb-3">
                <label for="number_of_people" class="form-label">จำนวนผู้เดินทาง</label>
                <input type="number" class="form-control" name="number_of_people" min="1" required>
            </div>

            <div class="mb-3">
                <label for="customer_name" class="form-label">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" name="customer_name" required>
            </div>

            <div class="mb-3">
                <label for="customer_phone" class="form-label">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control" name="customer_phone" required>
            </div>

            <div class="mb-3">
                <label for="customer_email" class="form-label">อีเมล</label>
                <input type="email" class="form-control" name="customer_email" required>
            </div>

            <button type="submit" class="btn btn-primary">ยืนยันการจอง</button>
        </form>
    </div>
</body>

</html>