@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">تعديل قطع الفرامل</h2>

    <div class="card">
        <div class="card-header bg-dark text-white">
            تعديل: {{ $brakePart->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('brake-parts.update', $brakePart->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">اسم القطعة:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $brakePart->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="manufacturer">الشركة المصنعة:</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ old('manufacturer', $brakePart->manufacturer) }}" required>
                </div>

                <div class="form-group">
                    <label for="price">السعر:</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $brakePart->price) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">الوصف:</label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $brakePart->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">الصورة:</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if ($brakePart->image)
                        <img src="{{ asset('storage/' . $brakePart->image) }}" alt="صورة القطعة" class="img-fluid mt-3" style="max-height: 150px;">
                    @else
                        <p>لا توجد صورة حالياً</p>
                    @endif
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">تحديث</button>
                    <a href="{{ route('brake-parts.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
