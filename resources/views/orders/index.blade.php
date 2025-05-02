@extends('layouts.app')

@section('content')
<div class="container">
    <h2>قائمة الطلبات</h2>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">إضافة طلب جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>المستخدم</th>
                <th>الإجمالي</th>
                <th>حالة الدفع</th>
                <th>حالة الطلب</th>
                <th>التاريخ</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->TotalAmount }}</td>
                <td>{{ ucfirst($order->PaymentStatus) }}</td>
                <td>{{ ucfirst($order->OrderStatus) }}</td>
                <td>{{ $order->OrderDate }}</td>
                <td>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
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
