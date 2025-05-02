@extends('layouts.app')

@section('content')
<div class="container">
    <h2>عرض أمر الصرف المخزني</h2>

    <div class="mb-3">
        <strong>رقم الأمر:</strong> {{ $order->issue_number }}<br>
        <strong>تاريخ الصرف:</strong> {{ $order->issue_date }}<br>
        <strong>تم الصرف بواسطة:</strong> {{ $order->issued_by }}<br>
        <strong>الموافقة من:</strong> {{ $order->approved_by }}<br>
        <strong>ملاحظات:</strong> {{ $order->notes }}
    </div>

    <h4>تفاصيل القطع:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم القطعة</th>
                <th>رقم العمود</th>
                <th>رقم الرف</th>
                <th>نوع القطعة</th>
                <th>فئة القطعة</th>
                <th>الكمية المصروفة</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->part_number }}</td>
                <td>{{ $item->column_number }}</td>
                <td>{{ $item->shelf_number }}</td>
                <td>{{ $item->part_type }}</td>
                <td>{{ $item->part_category }}</td>
                <td>{{ $item->issued_quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('stock_issue_orders.index') }}" class="btn btn-secondary mt-3">رجوع</a>
</div>
@endsection
