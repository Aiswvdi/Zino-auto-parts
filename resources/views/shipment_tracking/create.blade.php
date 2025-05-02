@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">إضافة تتبع شحنة</h2>

    <form action="{{ route('shipment_tracking.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">الطلب</label>
            <select name="OrderID" class="form-select" required>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">طلب رقم: {{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">الشحنة</label>
            <select name="ShippingID" class="form-select" required>
                @foreach($shippings as $shipping)
                    <option value="{{ $shipping->id }}">#{{ $shipping->trackingNumber }} - {{ $shipping->carrier }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">الحالة</label>
            <select name="Status" class="form-select" required>
                <option value="Processing">قيد المعالجة</option>
                <option value="Shipped">تم الشحن</option>
                <option value="In Transit">في الطريق</option>
                <option value="Out for Delivery">خرج للتوصيل</option>
                <option value="Delivered">تم التوصيل</option>
                <option value="Failed">فشل التوصيل</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">الموقع الحالي</label>
            <input type="text" name="CurrentLocation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">تاريخ التوصيل المتوقع</label>
            <input type="datetime-local" name="EstimatedDeliveryDate" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">تاريخ التوصيل الفعلي (اختياري)</label>
            <input type="datetime-local" name="ActualDeliveryDate" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection
