@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل أمر صرف مخزني</h2>

    <form action="{{ route('stock_issue_orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>رقم أمر الصرف:</label>
            <input type="text" name="issue_number" class="form-control" value="{{ $order->issue_number }}" required>
        </div>

        <div class="form-group">
            <label>تاريخ الصرف:</label>
            <input type="date" name="issue_date" class="form-control" value="{{ $order->issue_date }}" required>
        </div>

        <div class="form-group">
            <label>تم الصرف بواسطة:</label>
            <input type="text" name="issued_by" class="form-control" value="{{ $order->issued_by }}">
        </div>

        <div class="form-group">
            <label>الموافقة من:</label>
            <input type="text" name="approved_by" class="form-control" value="{{ $order->approved_by }}">
        </div>

        <div class="form-group">
            <label>ملاحظات:</label>
            <textarea name="notes" class="form-control">{{ $order->notes }}</textarea>
        </div>

        <hr>
        <h4>تفاصيل القطع (تعديل غير مدعوم هنا)</h4>
        <p>لا يمكن تعديل تفاصيل القطع من هذه الصفحة. لحذف أو تعديل التفاصيل، احذف الأمر وأضف واحد جديد.</p>

        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('stock_issue_orders.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
