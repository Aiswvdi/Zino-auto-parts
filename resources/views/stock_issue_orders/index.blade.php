@extends('layouts.app')

@section('content')
<div class="container">
    <h2>قائمة أوامر الصرف المخزني</h2>
    <a href="{{ route('stock_issue_orders.create') }}" class="btn btn-primary mb-3">إضافة أمر صرف جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم الأمر</th>
                <th>تاريخ الصرف</th>
                <th>تم بواسطة</th>
                <th>الموافقة من</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->issue_number }}</td>
                <td>{{ $order->issue_date }}</td>
                <td>{{ $order->issued_by }}</td>
                <td>{{ $order->approved_by }}</td>
                <td>
                    <a href="{{ route('stock_issue_orders.show', $order->id) }}" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('stock_issue_orders.edit', $order->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('stock_issue_orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
