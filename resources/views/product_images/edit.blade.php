@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">تعديل قطعة</h2>

    <form action="{{ route('warehouses.update', $warehouse->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="part_number" class="form-label">رقم القطعة</label>
            <input type="text" class="form-control" id="part_number" name="part_number" value="{{ old('part_number', $warehouse->part_number) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $warehouse->description) }}" required>
        </div>

        <div class="mb-3">
            <label for="car_name" class="form-label">اسم السيارة</label>
            <input type="text" class="form-control" id="car_name" name="car_name" value="{{ old('car_name', $warehouse->car_name) }}">
        </div>

        <div class="mb-3">
            <label for="car_model" class="form-label">موديل السيارة</label>
            <input type="text" class="form-control" id="car_model" name="car_model" value="{{ old('car_model', $warehouse->car_model) }}">
        </div>

        <div class="mb-3">
            <label for="car_category" class="form-label">فئة السيارة</label>
            <input type="text" class="form-control" id="car_category" name="car_category" value="{{ old('car_category', $warehouse->car_category) }}">
        </div>

        <div class="mb-3">
            <label for="product_type" class="form-label">نوع المنتج</label>
            <select class="form-select" id="product_type" name="product_type" required>
                <option value="">اختر النوع</option>
                <option value="أصلي" {{ old('product_type', $warehouse->product_type) == 'أصلي' ? 'selected' : '' }}>أصلي</option>
                <option value="تقليد" {{ old('product_type', $warehouse->product_type) == 'تقليد' ? 'selected' : '' }}>تقليد</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="manufacturer" class="form-label">الشركة المصنعة</label>
            <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $warehouse->manufacturer) }}" required>
        </div>

        <div class="mb-3">
            <label for="purchase_date" class="form-label">تاريخ الشراء</label>
            <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ old('purchase_date', $warehouse->purchase_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">الكمية</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $warehouse->quantity) }}" required>
        </div>

        <div class="mb-3">
            <label for="purchase_price" class="form-label">سعر الشراء</label>
            <input type="number" step="0.01" class="form-control" id="purchase_price" name="purchase_price" value="{{ old('purchase_price', $warehouse->purchase_price) }}" required>
        </div>

        <div class="mb-3">
            <label for="sale_price" class="form-label">سعر البيع</label>
            <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price" value="{{ old('sale_price', $warehouse->sale_price) }}" required>
        </div>

        <div class="mb-3">
            <label for="image_path" class="form-label">تغيير الصورة</label>
            <input class="form-control" type="file" id="image_path" name="image_path" accept="image/*">
        </div>

        @if($warehouse->image_path)
            <div class="mb-3">
                <p>الصورة الحالية:</p>
                <img src="{{ asset('storage/' . $warehouse->image_path) }}" alt="Current Image" width="150">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
    </form>
</div>
@endsection
