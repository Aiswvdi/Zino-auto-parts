@extends('layouts.app')

@section('content')
<div class="container">
    <h2>عناصر الطلب</h2>
    <a href="{{ route('order_items.create') }}" class="btn btn-primary mb-3">إضافة عنصر جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم الطلب</th>
                <th>المنتج</th>
                <th>الكمية</th>
                <th>السعر</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $item)
            <tr>
                <td>{{ $item->order->id }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->Quantity }}</td>
                <td>{{ $item->Price }}</td>
                <td>
                    <a href="{{ route('order_items.edit', $item->id) }}" class="btn btn-warning">تعديل</a>
                    <form action="{{ route('order_items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
