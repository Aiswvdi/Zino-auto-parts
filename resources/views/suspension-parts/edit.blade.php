@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">تعديل قطعة نظام التعليق</h2>

    <form action="{{ route('suspension-parts.update', $suspensionPart->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">اسم القطعة</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $suspensionPart->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $suspensionPart->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">السعر</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $suspensionPart->price) }}" required>
        </div>

        <div class="form-group">
            <label for="image">الصورة الحالية</label><br>
            @if ($suspensionPart->image)
                <img src="{{ asset('storage/' . $suspensionPart->image) }}" alt="صورة القطعة" style="max-height: 100px;">
            @else
                <p>لا توجد صورة حالياً</p>
            @endif
            <input type="file" name="image" id="image" class="form-control mt-2">
        </div>

        <button type="submit" class="btn btn-warning mt-3">تحديث القطعة</button>
    </form>
</div>
@endsection
