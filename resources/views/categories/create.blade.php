@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة فئة جديدة</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>اسم الفئة:</label>
            <input type="text" name="CategoryName" class="form-control" required>
        </div>
        <div class="form-group">
            <label>الحالة:</label>
            <select name="Status" class="form-control" required>
                <option value="1">مفعل</option>
                <option value="0">غير مفعل</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">إضافة</button>
    </form>
</div>
@endsection
