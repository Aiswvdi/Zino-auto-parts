@extends('layouts.app')

@section('content')
<div class="container">
    <h2>طلبات الإرجاع</h2>
    <a href="{{ route('returns.create') }}" class="btn btn-primary mb-3">إضافة مرتجع جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم الطلب</th>
                <th>سبب الإرجاع</th>
                <th>المبلغ المسترد</th>
                <th>تاريخ الإرجاع</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($returns as $return)
            <tr>
                <td>{{ $return->order->id }}</td>
                <td>{{ $return->returnReason }}</td>
                <td>{{ $return->refundAmount }}</td>
                <td>{{ $return->returnDate }}</td>
                <td>
                    <a href="{{ route('returns.edit', $return->id) }}" class="btn btn-warning">تعديل</a>
                    <form action="{{ route('returns.destroy', $return->id) }}" method="POST" style="display:inline;">
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
