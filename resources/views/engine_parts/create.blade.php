@extends('layouts.app')

@section('content')

  <div class="container mt-5">
    <h2 class="text-center">إضافة قطعة محرك جديدة</h2>

    <!-- ✅ Form -->
    <form action="{{ route('engine_parts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">اسم القطعة:</label>
        <input type="text" name="name" class="form-control" id="name" required>
      </div>

      <div class="form-group">
        <label for="manufacturer">اسم الشركة المصنعة:</label>
        <input type="text" name="manufacturer" class="form-control" id="manufacturer" required>
      </div>

      <div class="form-group">
        <label for="price">السعر (بالريال):</label>
        <input type="number" name="price" class="form-control" id="price" required>
      </div>

      <div class="form-group">
        <label for="description">الوصف:</label>
        <textarea name="description" class="form-control" id="description"></textarea>
      </div>

      <div class="form-group">
        <label for="type">النوع:</label>
        <select name="type" class="form-control" id="type" required>
          <option value="بواجي">بواجي</option>
          <option value="فلاتر">فلاتر</option>
          <option value="رؤوس سلندر">رؤوس سلندر</option>
          <!-- أضف هنا المزيد من الخيارات حسب الحاجة -->
        </select>
      </div>

      <div class="form-group">
        <label for="image">صورة القطعة:</label>
        <input type="file" name="image" class="form-control" id="image" required>
      </div>

      <button type="submit" class="btn btn-primary">إضافة القطعة</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
