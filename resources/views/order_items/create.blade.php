@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة عنصر طلب جديد</h2>
    <form action="{{ route('order_items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>رقم الطلب:</label>
            <select name="OrderID" class="form-control">
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>المنتج:</label>
            <select name="ProductID" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>الكمية:</label>
            <input type="number" name="Quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label>السعر:</label>
            <input type="number" step="0.01" name="Price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">إضافة</button>
    </form>
</div>
@endsection
