@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة شحنة جديدة</h2>
    <form action="{{ route('shippings.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>رقم الطلب:</label>
            <select name="orderID" class="form-control">
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>رقم التتبع:</label>
            <input type="text" name="trackingNumber" class="form-control">
        </div>

        <div class="form-group">
            <label>الناقل:</label>
            <input type="text" name="carrier" class="form-control">
        </div>

        <div class="form-group">
            <label>عنوان الشحن:</label>
            <textarea name="shippingAddress" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">إضافة</button>
    </form>
</div>
@endsection
