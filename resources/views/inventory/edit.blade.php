@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">تعديل بيانات المخزون</h2>

    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">المنتج</label>
            <select name="ProductID" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $inventory->ProductID == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">الكمية</label>
            <input type="number" name="Quantity" class="form-control" value="{{ $inventory->Quantity }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الموقع</label>
            <input type="text" name="Location" class="form-control" value="{{ $inventory->Location }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">سعر التكلفة</label>
            <input type="number" name="CostPrice" class="form-control" value="{{ $inventory->CostPrice }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">سعر البيع</label>
            <input type="number" name="SellingPrice" class="form-control" value="{{ $inventory->SellingPrice }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الحالة</label>
            <select name="Status" class="form-select">
                <option value="1" {{ $inventory->Status == 1 ? 'selected' : '' }}>نشط</option>
                <option value="0" {{ $inventory->Status == 0 ? 'selected' : '' }}>غير نشط</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection
