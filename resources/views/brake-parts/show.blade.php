<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تفاصيل القطعة</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center">{{ $brakePart->name }}</h2>

    <div class="card">
        <div class="card-header bg-dark text-white">
            {{ $brakePart->name }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($brakePart->image)
                        <img src="{{ asset('storage/' . $brakePart->image) }}" alt="صورة القطعة" class="img-fluid rounded" style="max-height: 200px;">
                    @else
                        <p>لا توجد صورة</p>
                    @endif
                </div>
                <div class="col-md-8">
                    <p><strong>اسم الشركة المصنعة:</strong> {{ $brakePart->manufacturer }}</p>
                    <p><strong>السعر:</strong> {{ $brakePart->price }} ريال</p>
                    <p><strong>الوصف:</strong> {{ $brakePart->description ?? 'لا يوجد وصف' }}</p>

                    <!-- زر العودة للقائمة -->
                    <a href="{{ url('/brake-parts') }}" class="btn btn-secondary">رجوع</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- 👇 FOOTER خاص بقطع غيار السيارات -->
<footer style="background-color: #1f1f1f; color: #ddd; padding-top: 40px; font-family: 'Segoe UI', sans-serif;">
    <div style="max-width: 1200px; margin: auto; padding: 0 20px; display: flex; flex-wrap: wrap; justify-content: space-between;">
        <!-- معلومات عامة -->
        <div style="flex: 1 1 200px; margin-bottom: 30px;">
            <h3 style="color: #f8c134;">عن متجرنا</h3>
            <p style="font-size: 14px;">
                نحن متخصصون في توفير أفضل قطع غيار السيارات الأصلية والبديلة، بأسعار تنافسية وخدمة توصيل سريعة لجميع أنحاء البلاد.
            </p>
            <img src="images/logo.png" alt="شعار الموقع" style="height: 40px; margin-top: 10px;">
        </div>

        <!-- روابط مهمة -->
        <div style="flex: 1 1 150px; margin-bottom: 30px;">
            <h4 style="color: #f8c134;">روابط سريعة</h4>
            <ul style="list-style: none; padding: 0; font-size: 14px;">
                <li><a href="#" style="color: #ccc; text-decoration: none;">من نحن</a></li>
                <li><a href="#" style="color: #ccc; text-decoration: none;">تواصل معنا</a></li>
                <li><a href="#" style="color: #ccc; text-decoration: none;">الشحن والتوصيل</a></li>
                <li><a href="#" style="color: #ccc; text-decoration: none;">سياسة الاسترجاع</a></li>
                <li><a href="#" style="color: #ccc; text-decoration: none;">الأسئلة الشائعة</a></li>
            </ul>
        </div>

        <!-- أقسام المتجر -->
        <div style="flex: 1 1 150px; margin-bottom: 30px;">
            <h4 style="color: #f8c134;">أقسام المتجر</h4>
            <ul style="list-style: none; padding: 0; font-size: 14px;">
                <li><a href="#" style="color: #ccc; text-decoration: none;">قطع المحرك</a></li>
                <li><a href="#" style="color: #ccc; text-decoration: none;">الإطارات والعجلات</a></li>
                <li><a href="#" style="color: #ccc; text-decoration: none;">الزيوت والسوائل</a></li>
                <li><a href="#" style="color: #ccc; text-decoration: none;">الإضاءة والبطاريات</a></li>
                <li><a href="#" style="color: #ccc; text-decoration: none;">الإكسسوارات</a></li>
            </ul>
        </div>

        <!-- تواصل اجتماعي -->
        <div style="flex: 1 1 200px; margin-bottom: 30px;">
            <h4 style="color: #f8c134;">تابعنا</h4>
            <div style="font-size: 20px;">
                <a href="#" style="color: #f8c134; margin-right: 10px;">🌐</a>
                <a href="#" style="color: #f8c134; margin-right: 10px;">📘</a>
                <a href="#" style="color: #f8c134; margin-right: 10px;">📸</a>
                <a href="#" style="color: #f8c134;">📱</a>
            </div>
        </div>
    </div>

    <div style="border-top: 1px solid #333; padding: 30px 20px; max-width: 1200px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
        <div style="flex: 1 1 180px; margin-bottom: 20px;">
            <h4 style="color: #f8c134;">خدمات العملاء</h4>
            <p>الدعم الفني</p>
            <p>تتبع الطلبات</p>
            <p>سياسة الضمان</p>
            <p>أسئلة متكررة</p>
        </div>
        <div style="flex: 1 1 180px; margin-bottom: 20px;">
            <h4 style="color: #f8c134;">قطع الغيار</h4>
            <p>أصلية معتمدة</p>
            <p>بديلة عالية الجودة</p>
            <p>قطع نادرة</p>
            <p>طلبات خاصة</p>
        </div>
        <div style="flex: 1 1 180px; margin-bottom: 20px;">
            <h4 style="color: #f8c134;">دعم البائعين</h4>
            <p>سجّل كبائع</p>
            <p>إدارة المنتجات</p>
            <p>إعلانات مميزة</p>
            <p>لوحة تحكم المورد</p>
        </div>
        <div style="flex: 1 1 180px; margin-bottom: 20px;">
            <h4 style="color: #f8c134;">الماركات</h4>
            <p>تويوتا</p>
            <p>هيونداي</p>
            <p>فورد</p>
            <p>نيسان</p>
        </div>
    </div>

    <div style="text-align: center; padding: 20px 10px; background-color: #111;">
        <small>&copy; 2025 جميع الحقوق محفوظة - متجر قطع غيار السيارات</small><br>
        <small style="font-size: 13px;">سياسة الخصوصية | شروط الاستخدام | ملفات تعريف الارتباط</small>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
