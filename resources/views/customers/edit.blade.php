@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل بيانات العميل: {{ $customer->FullName }}</h2>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>الاسم الكامل:</label>
            <input type="text" name="FullName" class="form-control" value="{{ $customer->FullName }}" required>
        </div>

        <div class="form-group">
            <label>البريد الإلكتروني:</label>
            <input type="email" name="Email" class="form-control" value="{{ $customer->Email }}" required>
        </div>

        <div class="form-group">
            <label>رقم الهاتف:</label>
            <input type="text" name="Phone" class="form-control" value="{{ $customer->Phone }}" required>
        </div>

        <div class="form-group">
            <label>العنوان:</label>
            <textarea name="Address" class="form-control">{{ $customer->Address }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            <i class="fas fa-save"></i> حفظ التعديلات
        </button>
    </form>
</div>
@endsection
