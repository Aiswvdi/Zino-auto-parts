@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold text-primary"><i class="fas fa-edit"></i> تعديل الفاتورة</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">رقم الفاتورة:</label>
            <input type="text" name="InvoiceNumber" class="form-control" value="{{ $invoice->InvoiceNumber }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">النوع:</label>
            <select name="InvoiceType" class="form-control">
                <option value="sale" {{ $invoice->InvoiceType == 'sale' ? 'selected' : '' }}>بيع</option>
                <option value="purchase" {{ $invoice->InvoiceType == 'purchase' ? 'selected' : '' }}>شراء</option>
                <option value="refund" {{ $invoice->InvoiceType == 'refund' ? 'selected' : '' }}>استرداد</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">العميل:</label>
            <select name="CustomerID" class="form-control">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $invoice->CustomerID == $customer->id ? 'selected' : '' }}>
                        {{ $customer->FullName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">الحالة:</label>
            <select name="PaymentStatus" class="form-control">
                <option value="paid" {{ $invoice->PaymentStatus == 'paid' ? 'selected' : '' }}>مدفوع</option>
                <option value="pending" {{ $invoice->PaymentStatus == 'pending' ? 'selected' : '' }}>معلق</option>
                <option value="overdue" {{ $invoice->PaymentStatus == 'overdue' ? 'selected' : '' }}>متأخر</option>
                <option value="canceled" {{ $invoice->PaymentStatus == 'canceled' ? 'selected' : '' }}>ملغي</option>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> الرجوع
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> حفظ التعديلات
            </button>
        </div>
    </form>
</div>
@endsection
