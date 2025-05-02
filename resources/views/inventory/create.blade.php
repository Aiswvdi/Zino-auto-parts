@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">إضافة عنصر إلى المخزون</h2>

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">المنتج</label>
            <select name="ProductID" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">الكمية</label>
            <input type="number" name="Quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الموقع</label>
            <input type="text" name="Location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">سعر التكلفة</label>
            <input type="number" name="CostPrice" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">سعر البيع</label>
            <input type="number" name="SellingPrice" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الحالة</label>
            <select name="Status" class="form-select">
                <option value="1">نشط</option>
                <option value="0">غير نشط</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
