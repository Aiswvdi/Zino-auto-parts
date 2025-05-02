@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🧾 جميع الفواتير</h2>

    <!-- زر إضافة فاتورة جديدة -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('invoices.create') }}" class="btn btn-success">
            ➕ إضافة فاتورة جديدة
        </a>
     
        <form action="{{ route('invoices.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="🔍 بحث عن فاتورة...">
            <button type="submit" class="btn btn-primary">بحث</button>
        </form>
    </div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>📌 رقم الفاتورة</th>
                    <th>📂 النوع</th>
                    <th>👤 العميل</th>
                    <th>📅 التاريخ</th>
                    <th>💰 الإجمالي</th>
                    <th>📌 الحالة</th>
                    <th>⚙️ الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                <tr>
                    <td><strong>#{{ $invoice->InvoiceNumber }}</strong></td>
                    <td>{{ ucfirst($invoice->InvoiceType) }}</td>
                    <td>{{ $invoice->customer->FullName }}</td>
                    <td>{{ \Carbon\Carbon::parse($invoice->InvoiceDate)->format('d/m/Y') }}</td>
                    <td>{{ number_format($invoice->TotalAmount, 2) }} {{ $invoice->Currency }}</td>
                    <td>
                        <span class="badge {{ getStatusClass($invoice->PaymentStatus) }}">
                            {{ ucfirst($invoice->PaymentStatus) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">✏️ تعديل</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف الفاتورة؟')">🗑️ حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- دالة مساعدة لتنسيق ألوان الحالة -->
@php
function getStatusClass($status) {
    return match ($status) {
        'paid' => 'badge-success',
        'pending' => 'badge-warning',
        'overdue' => 'badge-danger',
        'canceled' => 'badge-secondary',
        default => 'badge-light',
    };
}
@endphp

@endsection
