@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4"><i class="fas fa-edit"></i> تعديل الطلب رقم {{ $payment->OrderID }}</h2>

        <form action="{{ route('payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-calendar-alt"></i> التاريخ:</label>
                        <input type="datetime-local" name="PaymentDate" class="form-control"
                            value="{{ \Carbon\Carbon::parse($payment->PaymentDate)->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-dollar-sign"></i> المبلغ:</label>
                        <input type="number" name="PaymentAmount" class="form-control"
                            value="{{ $payment->PaymentAmount }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-credit-card"></i> طريقة الدفع:</label>
                        <select name="PaymentMethod" class="form-control">
                            <option value="credit_card" {{ $payment->PaymentMethod == 'credit_card' ? 'selected' : '' }}>بطاقة ائتمان</option>
                            <option value="paypal" {{ $payment->PaymentMethod == 'paypal' ? 'selected' : '' }}>باي بال</option>
                            <option value="bank_transfer" {{ $payment->PaymentMethod == 'bank_transfer' ? 'selected' : '' }}>تحويل بنكي</option>
                            <option value="cash" {{ $payment->PaymentMethod == 'cash' ? 'selected' : '' }}>نقدًا</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-info-circle"></i> الحالة:</label>
                        <select name="PaymentStatus" class="form-control">
                            <option value="pending" {{ $payment->PaymentStatus == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                            <option value="completed" {{ $payment->PaymentStatus == 'completed' ? 'selected' : '' }}>مكتمل</option>
                            <option value="failed" {{ $payment->PaymentStatus == 'failed' ? 'selected' : '' }}>فشل</option>
                            <option value="refunded" {{ $payment->PaymentStatus == 'refunded' ? 'selected' : '' }}>مسترد</option>
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
                                <option value="{{ $order->id }}" {{ $payment->OrderID == $order->id ? 'selected' : '' }}>{{ $order->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> اسم الدافع:</label>
                        <input type="text" name="PayerName" class="form-control"
                            value="{{ $payment->PayerName }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fas fa-coins"></i> العملة:</label>
                <input type="text" name="Currency" class="form-control" value="{{ $payment->Currency }}" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('payments.index') }}" class="btn btn-secondary btn-lg">
                    <i class="fas fa-arrow-left"></i> رجوع
                </a>
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> حفظ التعديلات
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
