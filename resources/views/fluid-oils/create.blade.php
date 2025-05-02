@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">إضافة زيت / سائل جديد</h2>

    <form action="{{ route('fluid-oils.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>الشركوة المصنعة</label>
            <input type="text" name="type" class="form-control">
        </div>

        <div class="form-group">
            <label>الوصف</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>السعر</label>
            <input type="number" name="price" step="0.01" class="form-control">
        </div>

        <div class="form-group">
            <label>الصورة</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection
