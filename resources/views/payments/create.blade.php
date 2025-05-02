@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4"><i class="fas fa-money-check-alt"></i> إضافة دفعة جديدة</h2>

        <form action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-calendar-alt"></i> التاريخ:</label>
                        <input type="datetime-local" name="PaymentDate" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-dollar-sign"></i> المبلغ:</label>
                        <input type="number" name="PaymentAmount" class="form-control" placeholder="أدخل المبلغ" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-credit-card"></i> طريقة الدفع:</label>
                        <select name="PaymentMethod" class="form-control">
                            <option value="credit_card">بطاقة ائتمان</option>
                            <option value="paypal">باي بال</option>
                            <option value="bank_transfer">تحويل بنكي</option>
                            <option value="cash">نقدًا</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-info-circle"></i> الحالة:</label>
                        <select name="PaymentStatus" class="form-control">
                            <option value="pending">قيد الانتظار</option>
                            <option value="completed">مكتمل</option>
                            <option value="failed">فشل</option>
                            <option value="refunded">مسترد</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-receipt"></i> رقم الطلب:</label>
                        <select name="OrderID" class="form-control">
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> اسم الدافع:</label>
                        <input type="text" name="PayerName" class="form-control" placeholder="أدخل اسم الدافع" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fas fa-coins"></i> العملة:</label>
                <input type="text" name="Currency" class="form-control" placeholder="أدخل رمز العملة (USD, EUR, etc.)" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('payments.index') }}" class="btn btn-secondary btn-lg">
                    <i class="fas fa-arrow-left"></i> إلغاء
                </a>
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-check"></i> إضافة
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
