@extends('layouts.app')

@section('content')
<div class="container">
    <h2>قائمة الشحنات</h2>
    <a href="{{ route('shippings.create') }}" class="btn btn-primary mb-3">إضافة شحنة جديدة</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم الطلب</th>
                <th>رقم التتبع</th>
                <th>الناقل</th>
                <th>عنوان الشحن</th>
                <th>تاريخ الشحن</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shippings as $shipping)
                <tr>
                    <td>{{ $shipping->order->id }}</td>
                    <td>{{ $shipping->trackingNumber }}</td>
                    <td>{{ $shipping->carrier }}</td>
                    <td>{{ $shipping->shippingAddress }}</td>
                    <td>{{ $shipping->shippingDate }}</td>
                    <td>
                        <a href="{{ route('shippings.edit', $shipping->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('shippings.destroy', $shipping->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
