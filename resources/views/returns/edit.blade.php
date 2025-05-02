@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل طلب الإرجاع</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('returns.update', $return->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>رقم الطلب:</label>
            <select name="OrderID" class="form-control">
                @foreach($orders as $order)
                    <option value="{{ $order->id }}" {{ $order->id == $return->OrderID ? 'selected' : '' }}>
                        {{ $order->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>سبب الإرجاع:</label>
            <textarea name="returnReason" class="form-control">{{ $return->returnReason }}</textarea>
        </div>

        <div class="form-group">
            <label>المبلغ المسترد:</label>
            <input type="number" step="0.01" name="refundAmount" class="form-control" value="{{ $return->refundAmount }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">تحديث</button>
        <a href="{{ route('returns.index') }}" class="btn btn-secondary mt-3">إلغاء</a>
    </form>
</div>
@endsection
