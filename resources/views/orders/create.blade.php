@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة طلب جديد</h2>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>المستخدم:</label>
            <select name="UserID" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>المبلغ الإجمالي:</label>
            <input type="number" step="0.01" name="TotalAmount" class="form-control" required>
        </div>
        <div class="form-group">
            <label>حالة الدفع:</label>
            <select name="PaymentStatus" class="form-control">
                <option value="Pending">معلق</option>
                <option value="Paid">مدفوع</option>
                <option value="Failed">فشل الدفع</option>
                <option value="Refunded">مسترد</option>
            </select>
        </div>
        <div class="form-group">
            <label>حالة الطلب:</label>
            <select name="OrderStatus" class="form-control">
                <option value="Pending">معلق</option>
                <option value="Processing">قيد المعالجة</option>
                <option value="Shipped">تم الشحن</option>
                <option value="Delivered">تم التوصيل</option>
                <option value="Cancelled">ملغي</option>
            </select>
        </div>
        <div class="form-group">
            <label>عنوان الشحن:</label>
            <textarea name="ShippingAddress" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">إضافة</button>
    </form>
</div>
@endsection
