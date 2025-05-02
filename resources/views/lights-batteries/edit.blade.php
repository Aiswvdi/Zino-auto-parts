@extends('layouts.app')

@section('content')

  <!-- ✅ تعديل القطعة -->
  <div class="container my-5">
    <h2 class="text-center">تعديل القطعة: {{ $lightBattery->name }}</h2>

    <form action="{{ route('lights-batteries.update', $lightBattery->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">الاسم</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $lightBattery->name) }}" required>
      </div>

      <div class="form-group">
        <label for="type">النوع</label>
        <input type="text" name="type" class="form-control" value="{{ old('type', $lightBattery->type) }}">
      </div>

      <div class="form-group">
        <label for="description">الوصف</label>
        <textarea name="description" class="form-control">{{ old('description', $lightBattery->description) }}</textarea>
      </div>

      <div class="form-group">
        <label for="price">السعر</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', $lightBattery->price) }}" step="0.01">
      </div>

      <div class="form-group">
        <label for="image">الصورة</label>
        <input type="file" name="image" class="form-control">
        @if($lightBattery->image)
          <p>الصورة الحالية:</p>
          <img src="{{ asset('storage/' . $lightBattery->image) }}" alt="{{ $lightBattery->name }}" class="img-fluid" width="100">
        @endif
      </div>

      <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
  </div>

  @endsection
