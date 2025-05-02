<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إضافة قطعة فرامل جديدة</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">إضافة قطعة فرامل جديدة</h2>

    <div class="card">
        <div class="card-header bg-dark text-white">
            إضافة قطعة فرامل
        </div>

        <div class="card-body">
            <form action="{{ route('brake-parts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">اسم القطعة</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="manufacturer">اسم الشركة المصنعة</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="price">السعر</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">الوصف</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">صورة القطعة</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">إضافة القطعة</button>
                <a href="{{ route('brake-parts.index') }}" class="btn btn-secondary">رجوع</a>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
