<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Zino auto Parts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


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

<!-- Navbar Apple Style -->
<nav id="appleNavbar" class="navbar fixed-top" style="backdrop-filter: blur(10px); background-color: rgba(0,0,0,0.7); padding: 8px 0; transition: top 0.4s ease; z-index: 999;">
  <div class="container d-flex justify-content-between align-items-center">

    <!-- الشعار -->
    <a class="navbar-brand d-flex align-items-center text-white font-weight-bold" href="index.html" style="font-size: 18px;">
  <img src="https://www.shutterstock.com/shutterstock/photos/1939340254/display_1500/stock-vector-vector-logo-of-car-parts-auto-repair-1939340254.jpg"
       alt="Logo" width="30" height="30" class="d-inline-block align-top mr-2 rounded-circle">
  <span class="ml-2">ZinoParts</span>
</a>


    <!-- القائمة -->
    <ul class="navbar-nav d-flex flex-row justify-content-center align-items-center mb-0" style="gap: 20px;">
      <li class="nav-item"><a class="nav-link text-white px-2" href="#">الرئيسية</a></li>


      <li class="nav-item dropdown position-relative custom-dropdown">
        <a class="nav-link text-white px-2" href="#" id="dropdownMenu">الأقسام</a>
        <div class="dropdown-menu custom-menu">
          <a class="dropdown-item text-white" href="#">قطع الغيار</a>
          <a class="dropdown-item text-white" href="#">الإلكترونيات</a>
          <a class="dropdown-item text-white" href="#">الزيوت والبطاريات</a>
        </div>
      </li>

      <li class="nav-item"><a class="nav-link text-white px-2" href="#">عروض</a></li>
      <li class="nav-item"><a class="nav-link text-white px-2" href="#">الدعم</a></li>
      <li class="nav-item">
      <a href="{{ url('/login') }}" class="nav-link text-white px-2">تسجيل الدخول</a>


</li>

    </ul>

    <!-- أيقونة البحث -->
    <div class="d-flex align-items-center ml-4">
      <div class="search-toggle text-white mr-4" onclick="toggleSearch()">
        <i class="fas fa-search"></i>
      </div>
      <form id="searchForm" class="form-inline d-none" onsubmit="return false;">
        <input class="form-control form-control-sm rounded-pill" type="text" placeholder="بحث..." style="background-color: #222; color: white; border: none;">
      </form>

      <!-- أيقونة السلة -->
      <a href="#" class="text-white ml-2"><i class="fas fa-shopping-cart"></i></a> <!-- تم تقليل المسافة هنا -->

    </div>

  </div>
</nav>

<style>
  .custom-dropdown:hover .custom-menu {
    display: block;
    opacity: 1;
    transform: translateY(0);
    visibility: visible;
  }

  .custom-dropdown .custom-menu {
    display: block;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #111;
    min-width: 250px; /* زيّنت العرض ليكون أكبر */
    padding: 10px 0;
    opacity: 0;
    transform: translateY(10px);
    visibility: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    z-index: 9999;
  }

  .custom-menu .dropdown-item {
    color: white;
    padding: 12px 20px; /* زيادة المسافة بين العناصر */
    transition: background 0.2s ease;
  }

  .custom-menu .dropdown-item:hover {
    background-color: #222;
  }

  /* توسيع المسافة لزر البحث */
  .search-toggle {
    padding: 8px 12px; /* زيادة حجم الأيقونة قليلاً */
    background-color: #333;
    border-radius: 50%;
  }

  /* توسيع الحافة الخارجية لزر البحث */
  #searchForm input {
    min-width: 300px; /* توسيع العرض ليصبح أكثر وضوحاً */
  }
</style>



<!-- تضمين مكتبة AOS للتأثيرات -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<!-- استدعاء خط Cairo -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;800&display=swap" rel="stylesheet">

<!-- تضمين مكتبة AOS للتأثيرات -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<!-- Main Content Section -->
<div style="padding: 0; margin-bottom: 0; position: relative; font-family: 'Cairo', sans-serif;">

    <!-- Carousel Section -->
    <div id="productCarousel" class="carousel slide" data-ride="carousel" data-interval="5000" style="position: relative;">
        <div class="carousel-inner">
            <!-- شريحة 1 -->
            <div class="carousel-item active">
                <div class="slider-wrapper">
                    <img src="{{ asset('images/slider/pngtree-3d.jpg') }}" class="d-block w-100" alt="منتج 1">
                    <div class="gradient-overlay"></div>
                    <div class="caption-overlay text-center" data-aos="fade-up">
                        <h2>كل ما تحتاجه لسيارتك من قطع غيار عالية الجودة</h2>
                        <a href="#shop" class="btn-shop" data-aos="fade-up" data-aos-delay="200">تسوق الآن</a>
                    </div>
                </div>
            </div>

            <!-- شريحة 2 -->
            <div class="carousel-item">
                <div class="slider-wrapper">
                    <img src="{{ asset('images/slider/Trends in Automotive Filter (1).png') }}" class="d-block w-100" alt="منتج 2">
                    <div class="gradient-overlay"></div>
                    <div class="caption-overlay text-center" data-aos="fade-up">
                        <h2>كل ما تحتاجه لسيارتك، في مكان واحد</h2>
                        <a href="#shop" class="btn-shop" data-aos="fade-up" data-aos-delay="200">تسوق الآن</a>
                    </div>
                </div>
            </div>

            <!-- شريحة 3 -->
            <div class="carousel-item">
                <div class="slider-wrapper">
                    <img src="{{ asset('images/slider/black-sport.jpg') }}" class="d-block w-100" alt="منتج 3">
                    <div class="gradient-overlay"></div>
                    <div class="caption-overlay text-center" data-aos="fade-up">
                        <h2>صيانة سيارتك بأفضل القطع من خبراء السيارات</h2>
                        <a href="#shop" class="btn-shop" data-aos="fade-up" data-aos-delay="200">تسوق الآن</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- أزرار التنقل -->
        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">السابق</span>
        </a>
        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">التالي</span>
        </a>
    </div>

<!-- قسم المقالات -->
<section style="background: linear-gradient(to top, #f9f9f9 90%, transparent); margin-top: -60px; padding: 80px 0 50px 0; z-index: 2; position: relative;">
    <div style="max-width: 1200px; margin: auto; padding: 0 20px;">
        <h2 style="text-align: center; color: #333; margin-bottom: 40px;" data-aos="fade-down" data-aos-duration="1000">عن الموقع وقطع الغيار</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <!-- مقال 1 -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="category-item" style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                <h4 style="color: #f8c134;">أهمية اختيار قطع الغيار الأصلية</h4>
                <p style="color: #666;">قطع الغيار الأصلية تضمن لك أداء عالياً وأماناً أفضل للسيارة. إليك كيفية التحقق من جودتها وما الذي يجعلها الخيار الأفضل.</p>
                <a href="#" style="color: #f8c134;">قراءة المزيد</a>
            </div>

            <!-- مقال 2 -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" class="category-item" style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                <h4 style="color: #f8c134;">كيفية الحفاظ على محرك السيارة</h4>
                <p style="color: #666;">المحرك هو قلب السيارة، وقطع الغيار المناسبة هي ما يعزز كفاءته. تعرف على كيفية العناية بمحرك السيارة باستخدام قطع الغيار الأصلية.</p>
                <a href="#" style="color: #f8c134;">قراءة المزيد</a>
            </div>

            <!-- مقال 3 -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600" class="category-item" style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                <h4 style="color: #f8c134;">أفضل قطع غيار للصيانة الدورية</h4>
                <p style="color: #666;">إليك قائمة بأفضل قطع الغيار التي يجب عليك تغييرها بشكل دوري للحفاظ على أداء سيارتك.</p>
                <a href="#" style="color: #f8c134;">قراءة المزيد</a>
            </div>
        </div>
    </div>
</section>

<!-- تفعيل AOS -->
<script>
    AOS.init({
        duration: 1200,  // مدة التأثير
        easing: 'ease-in-out', // تأثير الإنتقال
        once: true,  // التأثير يحدث مرة واحدة فقط
    });
</script>

<!-- تأثيرات الماوس باستخدام CSS -->
<style>
    .category-item {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* إضافة تأثيرات للتحريك والتظليل */
    }

    .category-item:hover {
        transform: translateY(-10px) scale(1.05); /* تحريك العنصر لأعلى مع تكبيره */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* إضافة ظل أكبر عند التحويم */
    }

    .category-item a {
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .category-item a:hover {
        color: #f8a234; /* تغيير اللون عند التمرير على الرابط */
    }
</style>


<!-- CSS خاص بالسلايدر -->
<style>
    .slider-wrapper {
        position: relative;
    }

    .gradient-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 150px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
        z-index: 1;
    }

    .caption-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        padding: 30px 40px;
        border-radius: 15px;
        text-align: center;
        max-width: 90%;
    }

    .caption-overlay h2 {
        color: #fff;
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 20px;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5); /* إضافة ظل للنص */
    }

    .btn-shop {
        display: inline-block;
        padding: 12px 24px;
        background-color: #f8c134;
        color: #000;
        font-size: 16px;
        font-weight: bold;
        border-radius: 30px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-shop:hover {
        background-color: #e6b021;
        color: #fff;
    }

    .carousel-item:hover img {
        transform: scale(1.05);
        transition: all 0.5s ease;
    }

    .category-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>

<!-- تفعيل AOS -->
<script>
    AOS.init();
</script>

<!-- تفعيل السلايدر -->
<script>
    $('#productCarousel').carousel({
        interval: 5000,
    });
</script>


<!-- Main Content -->
<div class="container mt-5">
    <div class="section-title">المنتجات</div>
    <div class="row category-section">
        @foreach($images as $image)
            <div class="col-md-3 mb-4">
                <div class="product-card text-center">
                    @if($image->image_path)
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid" alt="صورة المنتج">
                    @else
                        <img src="https://via.placeholder.com/200x200?text=لا+صورة" class="img-fluid" alt="بدون صورة">
                    @endif

                    <h5>{{ $image->product->name ?? 'غير محدد' }}</h5>
                    <p><strong>السعر:</strong> {{ $image->price ?? 'غير محدد' }} ر.س</p>
                    <a href="{{ route('product_images.show', $image->id) }}" class="btn btn-warning btn-sm mt-2">عرض التفاصيل</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- قسم الترويج الجديد -->
<section style="background: linear-gradient(to top, #f9f9f9 90%, transparent); padding: 100px 20px; z-index: 2; position: relative;">
    <div style="max-width: 1200px; margin: auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 50px;">

        <!-- نص ترويجي -->
        <div data-aos="fade-right" data-aos-duration="1200" style="flex: 1 1 400px;">
            <h2 style="color: #333; font-size: 2.5rem; margin-bottom: 20px;">اكتشف الجودة والموثوقية مع قطع الغيار الأصلية</h2>
            <p style="color: #666; font-size: 1.1rem; margin-bottom: 30px;">
                نقدم لك أفضل قطع الغيار الأصلية التي تضمن أداءً مميزًا لسيارتك، مع ضمان الجودة وخدمة ما بعد البيع.
            </p>
            <a href="#" style="background-color: #f8c134; color: white; padding: 12px 25px; border-radius: 30px; text-decoration: none; font-weight: bold; transition: background-color 0.3s ease;">
                تسوق الآن
            </a>
        </div>

        <!-- صورة ترويجية -->
        <div data-aos="fade-left" data-aos-duration="1200" style="flex: 1 1 400px; text-align: center;">
            <img src="images/a8a1ee101364965.5f1d65b8bc8d9.jpg" alt="ترويج قطع الغيار" style="width: 100%; max-width: 500px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); transition: transform 0.4s ease-in-out;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        </div>

    </div>
</section>



<!-- تفعيل AOS -->
<script>
    AOS.init({
        duration: 1200,  // مدة التأثير
        easing: 'ease-in-out', // تأثير الإنتقال
        once: true,  // التأثير يحدث مرة واحدة فقط
    });
</script>

<!-- تأثيرات الماوس باستخدام CSS -->
<style>
    .category-item {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* إضافة تأثيرات للتحريك والتظليل */
    }

    .category-item:hover {
        transform: translateY(-10px) scale(1.05); /* تحريك العنصر لأعلى مع تكبيره */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* إضافة ظل أكبر عند التحويم */
    }

    .category-item a {
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .category-item a:hover {
        color: #f8a234; /* تغيير اللون عند التمرير على الرابط */
    }

    /* تأثيرات صورة الترويج */
    img {
        transition: transform 0.3s ease-in-out;
    }

    img:hover {
        transform: scale(1.1); /* تكبير الصورة عند مرور الماوس */
    }
</style>


<section style="background-color: #f9f9f9; padding: 50px 0; font-family: 'Segoe UI', sans-serif;">
  <div style="max-width: 1200px; margin: auto; padding: 0 20px;">
    <h2 style="text-align: center; color: #333; margin-bottom: 40px;">أقسام قطع الغيار</h2>

    <style>
      .parts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
      }

      .part-card {
        display: block;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        text-decoration: none;
        color: inherit;
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

      @media (max-width: 600px) {
        .part-card {
          padding: 16px;
        }
      }
    </style>

    <div class="parts-grid">
      <!-- قسم المحرك -->
      <a href="{{ route('engine_parts.index') }}" class="part-card">
    <img src="{{ asset('images/engine-icon.png') }}" alt="قطع المحرك">
    <h4>قطع المحرك</h4>
    <p>بواجي، فلاتر، رؤوس سلندر والمزيد</p>
</a>

            <!-- قسم الفرامل -->
      <a href="{{ route('brake-parts.index') }}" class="part-card">
    <img src="{{ asset('images/brake-icon.png') }}" alt="نظام الفرامل">
    <h4>نظام الفرامل</h4>
    <p>ديسكات، أقمشة، ماستر فرامل</p>
</a>


      <!-- قسم التعليق -->
      <a href="{{ route('suspension-parts.index') }}" class="part-card">
    <img src="images/suspension-icon.png" alt="نظام التعليق">
    <h4>نظام التعليق</h4>
    <p>مساعدات، أذرعة، كراسي مكينة</p>
</a>


      <!-- قسم الزيوت والسوائل -->
      <a href="{{ route('fluid-oils.index') }}" class="part-card">
  <img src="{{ asset('images/oil-icon.png') }}" alt="الزيوت والسوائل">
  <h4>الزيوت والسوائل</h4>
  <p>زيت محرك، ماء رديتر، شحوم</p>
</a>


      <!-- قسم الإضاءة والبطاريات -->
      <a href="{{ route('lights-batteries.index') }}" class="part-card">
    <img src="images/light-icon.png" alt="الإضاءة والبطاريات">
    <h4>الإضاءة والبطاريات</h4>
    <p>لمبات، دينمو، بطاريات</p>
</a>
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
