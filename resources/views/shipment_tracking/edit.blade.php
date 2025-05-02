@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">تعديل تتبع الشحنة</h2>

    <form action="{{ route('shipment_tracking.update', $shipmentTracking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">الحالة</label>
            <select name="Status" class="form-select" required>
                @foreach(['Processing', 'Shipped', 'In Transit', 'Out for Delivery', 'Delivered', 'Failed'] as $status)
                    <option value="{{ $status }}" {{ $shipmentTracking->Status === $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">الموقع الحالي</label>
            <input type="text" name="CurrentLocation" class="form-control" value="{{ $shipmentTracking->CurrentLocation }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">تاريخ التوصيل المتوقع</label>
            <input type="datetime-local" name="EstimatedDeliveryDate" class="form-control" value="{{ \Carbon\Carbon::parse($shipmentTracking->EstimatedDeliveryDate)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">تاريخ التوصيل الفعلي</label>
            <input type="datetime-local" name="ActualDeliveryDate" class="form-control" value="{{ optional($shipmentTracking->ActualDeliveryDate)->format('Y-m-d\TH:i') }}">
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
