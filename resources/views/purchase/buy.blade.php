<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>منتجاتنا</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    body {
        background-color: #ffffff; /* خلفية بيضاء */
        font-family: Arial, sans-serif;
    }

    .navbar-custom {
        background-color: #000000; /* Navbar أسود */
    }

    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
        color: #ffffff;
    }

    .section-title {
        font-size: 1.8em;
        font-weight: bold;
        margin: 30px 0 20px;
        color: #111;
    }

    .category-section {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 40px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .product-card {
        border: none;
        border-radius: 10px;
        background-color: #f6f6f6;
        padding: 15px;
        transition: 0.3s;
    }

    .product-card:hover {
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transform: translateY(-5px);
    }

    .product-card img {
        max-height: 180px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .product-card h5 {
        font-size: 1.2em;
        color: #232f3e;
        font-weight: bold;
    }

    .product-card p {
        color: #555;
        margin: 5px 0;
    }

    .product-card .btn {
        background-color: #ffa41c;
        color: #000;
        font-weight: bold;
    }

    .product-card .btn:hover {
        background-color: #ff9900;
    }

    /* تخصيص السلايدر */
    .carousel-item img {
        object-fit: cover;
        height: 400px; /* تحديد ارتفاع الصورة */
    }
</style>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="#">
        <img src="https://www.shutterstock.com/shutterstock/photos/1939340254/display_1500/stock-vector-vector-logo-of-car-parts-auto-repair-1939340254.jpg"
             alt="Logo" width="40" height="40" class="d-inline-block align-top">
        منتجاتنا
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="#">الرئيسية</a></li>
            <li class="nav-item"><a class="nav-link" href="#">المنتجات</a></li>
            <li class="nav-item"><a class="nav-link" href="#">اتصل بنا</a></li>
        </ul>

        <!-- زر البحث -->
        <form class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="بحث عن قطع غيار" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">بحث</button>
        </form>

        <!-- قائمة تسجيل الدخول، إضافة حساب وعربة المشتريات -->
        <ul class="navbar-nav ml-3">
            <li class="nav-item">
                <a class="nav-link" href="#">تسجيل الدخول</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">إنشاء حساب</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-shopping-cart"></i> عربة المشتريات (0)
                </a>
            </li>
        </ul>
    </div>
</nav>
<meta charset="UTF-8">
<title>شراء المنتج</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
    :root {
        --main-color: #4CAF50;
        --hover-color: #388E3C;
        --text-color: #333;
        --bg-color: #f9f9f9;
        --card-bg: #ffffff;
        --accent-color: #ff9800;
        --shadow-color: rgba(0, 0, 0, 0.1);
        --transition-time: 0.3s;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--bg-color);
        margin: 0;
        padding: 30px 20px;
    }

    .container {
        max-width: 800px;
        margin: auto;
        background-color: var(--card-bg);
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px var(--shadow-color);
        transition: transform var(--transition-time);
    }

    .container:hover {
        transform: scale(1.02);
    }

    h2 {
        text-align: center;
        color: var(--main-color);
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: bold;
    }

    .product {
        text-align: center;
    }

    .product img {
        width: 100%;
        max-width: 400px;
        height: auto;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 4px 20px var(--shadow-color);
        transition: transform var(--transition-time);
    }

    .product img:hover {
        transform: scale(1.05);
    }

    .product h3 {
        font-size: 26px;
        color: var(--text-color);
        margin-bottom: 10px;
    }

    .product p {
        font-size: 20px;
        color: #555;
        margin-bottom: 25px;
    }

    .btn {
        display: inline-block;
        padding: 14px 35px;
        font-size: 18px;
        color: white;
        background-color: var(--main-color);
        text-decoration: none;
        border: none;
        border-radius: 10px;
        transition: background-color var(--transition-time), transform var(--transition-time);
        cursor: pointer;
        margin-top: 15px;
    }

    .btn:hover {
        background-color: var(--hover-color);
        transform: translateY(-3px);
    }

    .btn-secondary {
        background-color: var(--accent-color);
        margin-right: 10px;
    }

    .btn-secondary:hover {
        background-color: #e68900;
        transform: translateY(-3px);
    }
</style>

<body>
    <div class="container">
        <h2>تأكيد شراء المنتج</h2>

        <div class="product">
            <h3>{{ $image->product->name ?? 'اسم غير متوفر' }}</h3>
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="صورة المنتج">
            <p><strong>السعر:</strong> {{ $image->price }} ر.س</p>

            <a href="#" class="btn">تأكيد الشراء</a>
            <a href="{{ route('product_images.index') }}" class="btn btn-secondary">رجوع</a>
        </div>
    </div>
</body>

    <!-- 👇 قسم أقسام قطع الغيار - مع تأثيرات -->
<section style="background-color: #f9f9f9; padding: 50px 0; font-family: 'Segoe UI', sans-serif;">
    <div style="max-width: 1200px; margin: auto; padding: 0 20px;">
        <h2 style="text-align: center; color: #333; margin-bottom: 40px;">أقسام قطع الغيار</h2>

        <style>
            .part-card {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
            }

            .part-card:hover {
                transform: translateY(-8px) scale(1.03);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }

            .part-card img {
                width: 50px;
                margin-bottom: 10px;
                transition: transform 0.3s ease;
            }

            .part-card:hover img {
                transform: rotate(5deg) scale(1.1);
            }

            .part-card h4 {
                color: #f8c134;
                margin-bottom: 8px;
                font-size: 18px;
            }

            .part-card p {
                font-size: 14px;
                color: #666;
            }

            .parts-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 30px;
            }

            @media (max-width: 600px) {
                .part-card {
                    padding: 16px;
                }
            }
        </style>

        <div class="parts-grid">
            <!-- قسم 1 -->
            <div class="part-card">
                <img src="images/engine-icon.png" alt="قطع المحرك">
                <h4>قطع المحرك</h4>
                <p>بواجي، فلاتر، رؤوس سلندر والمزيد</p>
            </div>

            <!-- قسم 2 -->
            <div class="part-card">
                <img src="images/brake-icon.png" alt="نظام الفرامل">
                <h4>نظام الفرامل</h4>
                <p>ديسكات، أقمشة، ماستر فرامل</p>
            </div>

            <!-- قسم 3 -->
            <div class="part-card">
                <img src="images/suspension-icon.png" alt="نظام التعليق">
                <h4>نظام التعليق</h4>
                <p>مساعدات، أذرعة، كراسي مكينة</p>
            </div>

            <!-- قسم 4 -->
            <div class="part-card">
                <img src="images/oil-icon.png" alt="الزيوت والسوائل">
                <h4>الزيوت والسوائل</h4>
                <p>زيت محرك، ماء رديتر، شحوم</p>
            </div>

            <!-- قسم 5 -->
            <div class="part-card">
                <img src="images/light-icon.png" alt="الإضاءة والبطاريات">
                <h4>الإضاءة والبطاريات</h4>
                <p>لمبات، دينمو، بطاريات</p>
            </div>
        </div>
    </div>
</section>



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

    <!-- 🟧 القسم الإضافي: خدمات مثل أمازون -->
    <div style="border-top: 1px solid #333; padding: 30px 20px; max-width: 1200px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
        <!-- عمود 1 -->
        <div style="flex: 1 1 180px; margin-bottom: 20px;">
            <h4 style="color: #f8c134;">خدمات العملاء</h4>
            <p>الدعم الفني</p>
            <p>تتبع الطلبات</p>
            <p>سياسة الضمان</p>
            <p>أسئلة متكررة</p>
        </div>

        <!-- عمود 2 -->
        <div style="flex: 1 1 180px; margin-bottom: 20px;">
            <h4 style="color: #f8c134;">قطع الغيار</h4>
            <p>أصلية معتمدة</p>
            <p>بديلة عالية الجودة</p>
            <p>قطع نادرة</p>
            <p>طلبات خاصة</p>
        </div>

        <!-- عمود 3 -->
        <div style="flex: 1 1 180px; margin-bottom: 20px;">
            <h4 style="color: #f8c134;">دعم البائعين</h4>
            <p>سجّل كبائع</p>
            <p>إدارة المنتجات</p>
            <p>إعلانات مميزة</p>
            <p>لوحة تحكم المورد</p>
        </div>

        <!-- عمود 4 -->
        <div style="flex: 1 1 180px; margin-bottom: 20px;">
            <h4 style="color: #f8c134;">الماركات</h4>
            <p>تويوتا</p>
            <p>هيونداي</p>
            <p>فورد</p>
            <p>نيسان</p>
        </div>
    </div>

    <!-- الحقوق -->
    <div style="text-align: center; padding: 20px 10px; background-color: #111;">
        <small>&copy; 2025 جميع الحقوق محفوظة - متجر قطع غيار السيارات</small><br>
        <small style="font-size: 13px;">سياسة الخصوصية | شروط الاستخدام | ملفات تعريف الارتباط</small>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
