@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تعديل الفئة</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>اسم الفئة:</label>
            <input type="text" name="CategoryName" class="form-control" value="{{ $category->CategoryName }}" required>
        </div>
        <div class="form-group">
            <label>الحالة:</label>
            <select name="Status" class="form-control" required>
                <option value="1" {{ $category->Status ? 'selected' : '' }}>مفعل</option>
                <option value="0" {{ !$category->Status ? 'selected' : '' }}>غير مفعل</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">تحديث</button>
    </form>
</div>
@endsection
