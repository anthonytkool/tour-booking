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

        @auth
            <form method="POST" action="{{ route('booking.store', ['id' => $tour->id]) }}">
                @csrf

                <div class="mb-3">
                    <label for="travel_date" class="form-label">วันที่เดินทาง</label>
                    <input type="date" id="travel_date" class="form-control" name="travel_date" required>
                </div>

                <div class="mb-3">
                    <label for="number_of_people" class="form-label">จำนวนผู้เดินทาง</label>
                    <input type="number" id="number_of_people" class="form-control" name="number_of_people" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="customer_name" class="form-label">ชื่อ-นามสกุล</label>
                    <input type="text" id="customer_name" class="form-control" name="customer_name" required>
                </div>

                <div class="mb-3">
                    <label for="customer_phone" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" id="customer_phone" class="form-control" name="customer_phone" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">อีเมล (ล็อกอินแล้ว)</label>
                    <input type="email"
                           class="form-control"
                           name="customer_email"
                           value="{{ Auth::user()->email }}"
                           readonly>
                </div>

                <button type="submit" class="btn btn-primary">ยืนยันการจอง</button>
            </form>
        @else
            <div class="alert alert-info text-center">
                กรุณา <a href="{{ route('login', ['redirect' => url()->current()]) }}">ล็อกอิน</a>
                หรือ <a href="{{ route('register') }}">สมัครสมาชิก</a>
                ก่อนจอง
            </div>
        @endauth

    </div>
</body>

</html>
