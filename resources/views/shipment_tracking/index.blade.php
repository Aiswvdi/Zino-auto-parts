@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تتبع الشحنات</h2>
    <a href="{{ route('shipment_tracking.create') }}" class="btn btn-primary mb-3">إضافة شحنة جديدة</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>رقم الطلب</th>
                <th>طريقة الشحن</th>
                <th>الموقع الحالي</th>
                <th>الحالة</th>
                <th>التسليم المتوقع</th>
                <th>تاريخ التسليم</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $shipment)
            <tr>
                <td>{{ $shipment->order->id }}</td>
                <td>{{ $shipment->shipping->name ?? 'غير محدد' }}</td>
                <td>{{ $shipment->CurrentLocation }}</td>
                <td>{{ $shipment->Status }}</td>
                <td>{{ $shipment->EstimatedDeliveryDate }}</td>
                <td>{{ $shipment->ActualDeliveryDate ?? '—' }}</td>
                <td>
                    <a href="{{ route('shipment_tracking.edit', $shipment->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form action="{{ route('shipment_tracking.destroy', $shipment->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
