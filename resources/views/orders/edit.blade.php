@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل الطلب رقم {{ $order->id }}</h2>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>المستخدم:</label>
            <select name="UserID" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $order->UserID == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>المبلغ الإجمالي:</label>
            <input type="number" step="0.01" name="TotalAmount" class="form-control" value="{{ $order->TotalAmount }}" required>
        </div>

        <div class="form-group">
            <label>حالة الدفع:</label>
            <select name="PaymentStatus" class="form-control">
                <option value="Pending" {{ $order->PaymentStatus == 'Pending' ? 'selected' : '' }}>معلق</option>
                <option value="Paid" {{ $order->PaymentStatus == 'Paid' ? 'selected' : '' }}>مدفوع</option>
                <option value="Failed" {{ $order->PaymentStatus == 'Failed' ? 'selected' : '' }}>فشل الدفع</option>
                <option value="Refunded" {{ $order->PaymentStatus == 'Refunded' ? 'selected' : '' }}>مسترد</option>
            </select>
        </div>

        <div class="form-group">
            <label>حالة الطلب:</label>
            <select name="OrderStatus" class="form-control">
                <option value="Pending" {{ $order->OrderStatus == 'Pending' ? 'selected' : '' }}>معلق</option>
                <option value="Processing" {{ $order->OrderStatus == 'Processing' ? 'selected' : '' }}>قيد المعالجة</option>
                <option value="Shipped" {{ $order->OrderStatus == 'Shipped' ? 'selected' : '' }}>تم الشحن</option>
                <option value="Delivered" {{ $order->OrderStatus == 'Delivered' ? 'selected' : '' }}>تم التوصيل</option>
                <option value="Cancelled" {{ $order->OrderStatus == 'Cancelled' ? 'selected' : '' }}>ملغي</option>
            </select>
        </div>

        <div class="form-group">
            <label>عنوان الشحن:</label>
            <textarea name="ShippingAddress" class="form-control" required>{{ $order->ShippingAddress }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            <i class="fas fa-save"></i> حفظ التعديلات
        </button>
    </form>
</div>
@endsection
