<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>قطع نظام التعليق</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Cairo', sans-serif;
      direction: rtl;
      text-align: right;
    }

    .header-title {
      margin: 50px 0 30px;
      text-align: center;
      font-weight: bold;
      color: #333;
    }

    .parts-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 0 20px 40px;
    }

    .part-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
      padding: 20px;
      transition: transform 0.3s;
    }

    .part-card:hover {
      transform: translateY(-5px);
    }

    .part-card img {
      width: 100px;
      height: 100px;
      object-fit: contain;
      margin-bottom: 15px;
    }

    .part-card h5 {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .part-card p {
      font-size: 14px;
      color: #666;
    }

    .filter-section {
      margin-bottom: 30px;
      text-align: center;
    }

    .filter-section select {
      width: 200px;
      padding: 8px;
    }

    footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 20px 0;
      margin-top: 50px;
    }
  </style>
</head>
<body>

  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">متجر قطع الغيار</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/">الرئيسية</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('suspension-parts.index') }}">قطع نظام التعليق</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact">اتصل بنا</a></li>
      </ul>
    </div>
  </nav>

  <!-- ✅ عنوان الصفحة -->
  <div class="container">
    <h2 class="header-title">جميع قطع نظام التعليق</h2>

    <!-- ✅ فلتر النوع -->
    <div class="filter-section">
      <form method="GET" action="{{ route('suspension-parts.index') }}">
        <select name="type" onchange="this.form.submit()">
          <option value="">-- عرض الكل --</option>
          @foreach ($types as $typeOption)
            <option value="{{ $typeOption }}" {{ request('type') == $typeOption ? 'selected' : '' }}>{{ $typeOption }}</option>
          @endforeach
        </select>
      </form>
    </div>

    <!-- ✅ البطاقات -->
    <div class="parts-grid">
      @forelse($suspensionParts as $part)
        <div class="part-card">
          <img src="{{ asset('storage/' . $part->image) }}" alt="{{ $part->name }}">
          <h5>{{ $part->name }}</h5>
          <p>{{ $part->description }}</p>
          <a href="{{ route('suspension-parts.show', $part->id) }}" class="btn btn-warning btn-sm mt-2">تفاصيل</a>
        </div>
      @empty
        <p class="text-center w-100">لا توجد قطع متوفرة حالياً.</p>
      @endforelse
    </div>
  </div>

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
<script>
  function toggleSearch() {
    const searchForm = document.getElementById('searchForm');
    searchForm.classList.toggle('d-none');
  }

  // إخفاء/إظهار الشريط عند التمرير مثل Apple
  let lastScrollTop = 0;
  const navbar = document.getElementById("appleNavbar");

  window.addEventListener("scroll", function () {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    navbar.style.top = scrollTop > lastScrollTop ? "-80px" : "0";
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  });
</script>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
