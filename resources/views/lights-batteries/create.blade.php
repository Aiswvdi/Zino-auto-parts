@extends('layouts.app')

@section('content')

  <!-- ✅ إضافة قطعة جديدة -->
  <div class="container my-5">
    <h2 class="text-center">إضافة قطعة جديدة للإضاءة والبطاريات</h2>

    <form action="{{ route('lights-batteries.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="name">الاسم</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="type">النوع</label>
        <input type="text" name="type" class="form-control">
      </div>

      <div class="form-group">
        <label for="description">الوصف</label>
        <textarea name="description" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label for="price">السعر</label>
        <input type="number" name="price" class="form-control" step="0.01">
      </div>

      <div class="form-group">
        <label for="image">الصورة</label>
        <input type="file" name="image" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
  </div>

  @endsection
