@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة قطعة جديدة</h2>
    <form action="{{ route('warehouses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>رقم القطعة:</label>
            <input type="text" name="part_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label>الوصف:</label>
            <input type="text" name="description" class="form-control" required>
        </div>

        <div class="form-group">
            <label>اسم السيارة:</label>
            <input type="text" name="car_name" class="form-control">
        </div>

        <div class="form-group">
            <label>موديل السيارة:</label>
            <input type="text" name="car_model" class="form-control">
        </div>

        <div class="form-group">
            <label>فئة السيارة:</label>
            <select name="car_category" class="form-control" required>
                <option value="">-- اختر فئة السيارة --</option>
                <option value="سيدان">سيدان</option>
                <option value="هاتشباك">هاتشباك</option>
                <option value="SUV">SUV</option>
                <option value="بيك أب">بيك أب</option>
                <option value="رياضية">رياضية</option>
                <option value="عائلية">عائلية</option>
                <option value="أخرى">أخرى</option>
            </select>
        </div>

        <div class="form-group">
            <label>نوع المنتج:</label>
            <select name="product_type" class="form-control" required>
                <option value="">-- اختر نوع المنتج --</option>
                <option value="أصلي">أصلي</option>
                <option value="تقليد">تقليد</option>
            </select>
        </div>

        <div class="form-group">
            <label>الشركة المصنعة:</label>
            <input type="text" name="manufacturer" class="form-control" required>
        </div>

        <div class="form-group">
            <label>تاريخ الشراء:</label>
            <input type="date" name="purchase_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>الكمية:</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label>سعر الشراء:</label>
            <input type="number" step="0.01" name="purchase_price" class="form-control" required>
        </div>

        <div class="form-group">
            <label>سعر البيع:</label>
            <input type="number" step="0.01" name="sale_price" class="form-control" required>
        </div>

        <div class="form-group">
            <label>صورة القطعة (مطلوب):</label>
            <input type="file" name="image_path" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">إضافة</button>
    </form>
</div>
@endsection
