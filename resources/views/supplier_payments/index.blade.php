@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>المدفوعات للموردين</h2>
            <a href="{{ route('supplier_payments.create') }}" class="btn btn-primary">+ إضافة دفع</a>
        </div>

        @if($payments->isEmpty())
            <div class="alert alert-info">
                لا توجد مدفوعات حالياً.
            </div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>المورد</th>
                        <th>الفاتورة</th>
                        <th>المبلغ</th>
                        <th>طريقة الدفع</th>
                        <th>التاريخ</th>
                        <th>الحالة</th>
                        <th>التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->supplier->name ?? '-' }}</td>
                            <td>{{ $payment->invoice->InvoiceNumber ?? '-' }}</td>
                            <td>{{ number_format($payment->AmountPaid, 2) }}</td>
                            <td>{{ $payment->PaymentMethod }}</td>
                            <td>{{ \Carbon\Carbon::parse($payment->PaymentDate)->format('Y-m-d H:i') }}</td>
                            <td>
                                @php
                                    $statusColors = ['Pending' => 'warning', 'Completed' => 'success', 'Failed' => 'danger'];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$payment->Status] ?? 'secondary' }}">
                                    {{ $payment->Status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('supplier_payments.edit', $payment->PaymentID) }}" class="btn btn-sm btn-warning">تعديل</a>

                                <form action="{{ route('supplier_payments.destroy', $payment->PaymentID) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الدفع؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
