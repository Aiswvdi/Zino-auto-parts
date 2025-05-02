@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل عنصر الطلب رقم {{ $orderItem->id }}</h2>
    <form action="{{ route('order_items.update', $orderItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>رقم الطلب:</label>
            <select name="OrderID" class="form-control">
                @foreach($orders as $order)
                    <option value="{{ $order->id }}" {{ $orderItem->OrderID == $order->id ? 'selected' : '' }}>
                        {{ $order->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>المنتج:</label>
            <select name="ProductID" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $orderItem->ProductID == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>الكمية:</label>
            <input type="number" name="Quantity" class="form-control" value="{{ $orderItem->Quantity }}" required>
        </div>

        <div class="form-group">
            <label>السعر:</label>
            <input type="number" step="0.01" name="Price" class="form-control" value="{{ $orderItem->Price }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            <i class="fas fa-save"></i> حفظ التعديلات
        </button>
    </form>
</div>
@endsection
