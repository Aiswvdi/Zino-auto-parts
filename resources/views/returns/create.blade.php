@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة طلب إرجاع جديد</h2>
    <form action="{{ route('returns.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>رقم الطلب:</label>
            <select name="OrderID" class="form-control">
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>سبب الإرجاع:</label>
            <textarea name="returnReason" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>المبلغ المسترد:</label>
            <input type="number" step="0.01" name="refundAmount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">إضافة</button>
    </form>
</div>
@endsection
