@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">تعديل بيانات القطعة</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('engine_parts.update', $enginePart->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">اسم القطعة</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $enginePart->name }}" required>
        </div>

        <div class="form-group">
            <label for="manufacturer">الشركة المصنعة</label>
            <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $enginePart->manufacturer }}" required>
        </div>

        <div class="form-group">
            <label for="price">السعر</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $enginePart->price }}" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ $enginePart->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">صورة القطعة الحالية</label><br>
            @if($enginePart->image)
                <img src="{{ asset('storage/' . $enginePart->image) }}" alt="صورة القطعة" width="120">
            @else
                <p>لا توجد صورة</p>
            @endif
        </div>

        <div class="form-group">
            <label for="image">تحديث الصورة (اختياري)</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-success">تحديث</button>
        <a href="{{ route('engine_parts.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
