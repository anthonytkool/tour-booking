<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>รายการทัวร์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h1 class="mb-4">รายการแพ็กเกจทัวร์</h1>

        <div class="row">
            @foreach ($tours as $tour)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tour['name'] }}</h5>
                        <p class="card-text">ราคา: {{ number_format($tour['price']) }} บาท</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>