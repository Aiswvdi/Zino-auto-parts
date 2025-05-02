@extends('layouts.app') 
@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <h4 class="mb-3">إدخال معلومات السيارة</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('car-info.store') }}" method="POST">
            @csrf

            {{-- موديل السيارة --}}
            <div class="mb-3">
                <label for="car_model" class="form-label fw-bold">موديل السيارة</label>
                <input type="text" name="car_model" id="car_model" class="form-control"
                       value="{{ old('car_model') }}" required placeholder="مثال: كورولا 2020">
            </div>

            {{-- فئة السيارة --}}
            <div class="mb-3">
                <label for="car_category" class="form-label fw-bold">فئة السيارة</label>
                <input type="text" name="car_category" id="car_category" class="form-control"
                       value="{{ old('car_category') }}" required placeholder="مثال: سيدان، SUV">
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> حفظ</button>
        </form>
    </div>
</div>
@endsection
