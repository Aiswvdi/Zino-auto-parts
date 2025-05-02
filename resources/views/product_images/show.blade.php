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

    <meta charset="UTF-8">
    <title>تفاصيل المنتج</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <style>
        :root {
            --main-blue: #1428a0;
            --main-green: #28a745;
            --main-yellow: #ffc107;
            --dark-blue: #0e1d7a;
            --text-color: #1a1a1a;
            --bg-color: #f4f4f4;
            --card-bg: #ffffff;
            --shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Almarai', sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            padding: 0;
        }

        .fade-in-up {
            opacity: 0;
            transform: translateY(40px);
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background-color: var(--card-bg);
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow);
        }

        h2 {
            text-align: center;
            color: var(--text-color);
            font-size: 32px;
            margin-bottom: 30px;
        }

        .product-section {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .product-image img {
            width: 100%;
            max-width: 400px;
            border-radius: 14px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.1);
            transition: transform 0.4s ease;
        }

        .product-image img:hover {
            transform: scale(1.05);
        }

        .product-details {
            flex: 1;
        }

        .product-details h3 {
            color: var(--main-blue);
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 14px;
        }

        .product-details p {
            font-size: 20px;
            color: #555;
            margin: 10px 0;
        }

        .promotion {
            background-color: #e9f0ff;
            border-left: 6px solid var(--main-blue);
            padding: 20px;
            border-radius: 12px;
            font-size: 18px;
            color: #002b80;
            box-shadow: 0 4px 12px rgba(0, 42, 255, 0.1);
            animation: pulsePromo 2s infinite;
        }

        @keyframes pulsePromo {
            0% { background-color: #e9f0ff; }
            50% { background-color: #d0e4ff; }
            100% { background-color: #e9f0ff; }
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn {
            padding: 14px 30px;
            font-size: 16px;
            border-radius: 10px;
            text-decoration: none;
            color: white;
            transition: 0.3s ease;
        }

        .btn-return {
            background-color: #6c757d;
        }
        .btn-return:hover {
            background-color: #5a6268;
        }

        .btn-buy {
            background-color: var(--main-blue);
        }
        .btn-buy:hover {
            background-color: var(--dark-blue);
        }

        .btn-inquiry {
            background-color: var(--main-yellow);
            color: #333;
        }
        .btn-inquiry:hover {
            background-color: #e0a800;
        }

        @media (max-width: 768px) {
            .product-section {
                flex-direction: column;
                text-align: center;
            }
            .product-details {
                padding-top: 20px;
            }
        }
    </style>
</head>
<body>
<div class="container fade-in-up">
    <h2>تفاصيل المنتج</h2>
    <div class="product-section">
        <!-- صورة المنتج -->
        <div class="product-image fade-in-up">
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="صورة المنتج">
        </div>

        <!-- تفاصيل المنتج -->
        <div class="product-details fade-in-up">
            <h3>{{ $image->product->name ?? 'غير محدد' }}</h3>
            <p><strong>السعر:</strong> {{ $image->price ?? '—' }} ر.س</p>

            <div class="promotion">
                <strong>🎁 عرض خاص:</strong> خصم <strong>20%</strong> لفترة محدودة حتى <strong>30 أبريل 2025</strong>
            </div>

       <!-- فورم إرسال الكمية -->
<form action="/add-to-cart" method="POST">
    <!-- إذا كنت تستخدم Laravel لا تنسى csrf -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">



</form>



            <div class="buttons">
                <a href="{{ route('product_images.index') }}" class="btn btn-return">العودة</a>
                <a href="{{ route('purchase', ['id' => $image->id]) }}" class="btn btn-buy">شراء الآن</a>
                <a href="mailto:info@example.com?subject=استفسار عن {{ $image->product->name ?? 'المنتج' }}" class="btn btn-inquiry">استفسار</a>
            </div>
        </div>
    </div>
</div>

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

<!-- قسم طرق الدفع -->
<section id="paymentMethods" class="py-5">
  <div class="container">
    <h2 class="text-center text-white mb-4">طرق الدفع</h2>
    <div class="row justify-content-center">
      <!-- PayPal -->
      <div class="col-md-2 col-4 text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/30/PayPal_logo_2014.svg" alt="PayPal" class="payment-icon">
        <p class="text-white">PayPal</p>
      </div>

      <!-- Visa -->
      <div class="col-md-2 col-4 text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/47/Visa_Logo_2014.svg" alt="Visa" class="payment-icon">
        <p class="text-white">Visa</p>
      </div>

      <!-- MasterCard -->
      <div class="col-md-2 col-4 text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Mastercard-logo.svg" alt="MasterCard" class="payment-icon">
        <p class="text-white">MasterCard</p>
      </div>

      <!-- Apple Pay -->
      <div class="col-md-2 col-4 text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a3/Apple_Pay_logo.svg" alt="Apple Pay" class="payment-icon">
        <p class="text-white">Apple Pay</p>
      </div>

      <!-- Google Pay -->
      <div class="col-md-2 col-4 text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Google_Pay_logo.svg/500px-Google_Pay_logo.svg.png" alt="Google Pay" class="payment-icon">
        <p class="text-white">Google Pay</p>
      </div>
    </div>
  </div>
</section>

<style>
  #paymentMethods {
    background-color: #333;
  }

  .payment-icon {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
  }

  .text-white {
    color: #fff !important;
  }

  .col-md-2 {
    margin-bottom: 20px;
  }

  p {
    font-size: 14px;
    font-weight: bold;
  }
</style>



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
<script>
    const unitPrice = 150; // السعر للوحدة

    function updateTotal() {
        let quantity = parseInt(document.getElementById('quantity').value);
        let total = quantity * unitPrice;
        document.getElementById('total-price').innerText = total;
    }

    function increaseQuantity() {
        let qtyInput = document.getElementById('quantity');
        let current = parseInt(qtyInput.value);
        qtyInput.value = current + 1;
        updateTotal();
    }

    function decreaseQuantity() {
        let qtyInput = document.getElementById('quantity');
        let current = parseInt(qtyInput.value);
        if (current > 1) {
            qtyInput.value = current - 1;
            updateTotal();
        }
    }

    // تحديث الكمية والسعر في الخادم عند إرسال الفورم
    document.getElementById('cart-form').addEventListener('submit', function(event) {
        event.preventDefault();  // منع الإرسال التلقائي للفورم
        let quantity = document.getElementById('quantity').value;

        // إرسال البيانات إلى الخادم عبر AJAX (استخدام jQuery هنا)
        $.ajax({
            url: '/update-price',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                quantity: quantity,
                // يمكن إضافة أي معلومات إضافية (مثل product_id)
            },
            success: function(response) {
                // هنا يمكنك تحديث واجهة المستخدم أو إظهار رسالة نجاح
                alert('تم تحديث السعر بنجاح');
            },
            error: function(error) {
                alert('حدث خطأ، يرجى المحاولة لاحقًا');
            }
        });
    });
</script>




</body>

</html>
