@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة عميل جديد</h2>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>الاسم الكامل:</label>
            <input type="text" name="FullName" class="form-control" required>
        </div>
        <div class="form-group">
            <label>البريد الإلكتروني:</label>
            <input type="email" name="Email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>رقم الهاتف:</label>
            <input type="text" name="Phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label>العنوان:</label>
            <textarea name="Address" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">إضافة</button>
    </form>
</div>
@endsection
