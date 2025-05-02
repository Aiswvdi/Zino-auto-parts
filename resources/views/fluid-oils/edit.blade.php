@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">تعديل الزيت / السائل</h2>

    <form action="{{ route('fluids-oils.update', $fluid->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ $fluid->name }}" required>
        </div>

        <div class="form-group">
            <label>النوع</label>
            <input type="text" name="type" class="form-control" value="{{ $fluid->type }}">
        </div>

        <div class="form-group">
            <label>الوصف</label>
            <textarea name="description" class="form-control">{{ $fluid->description }}</textarea>
        </div>

        <div class="form-group">
            <label>السعر</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ $fluid->price }}">
        </div>

        <div class="form-group">
            <label>الصورة الحالية</label><br>
            @if($fluid->image)
                <img src="{{ asset('storage/' . $fluid->image) }}" width="100">
            @endif
        </div>

        <div class="form-group">
            <label>تحديث الصورة</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
