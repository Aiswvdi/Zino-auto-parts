@extends('layouts.app')

@section('content')

<div class="container">
    <h2>قائمة قطع الغيار في المخزن</h2>
    <a href="{{ route('warehouses.create') }}" class="btn btn-primary mb-3">إضافة قطعة جديدة</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم القطعة</th>
                <th>الوصف</th>
                <th>اسم السيارة</th>
                <th>موديل السيارة</th>
                <th>الفئة</th>
                <th>الشركة المصنعة</th>
                <th>الكمية</th>
                <th>سعر الشراء</th>
                <th>سعر البيع</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warehouses as $warehouse)
                <tr>
                    <td>{{ $warehouse->part_number }}</td>
                    <td>{{ $warehouse->description }}</td>
                    <td>{{ $warehouse->car_name }}</td>
                    <td>{{ $warehouse->car_model }}</td>
                    <td>{{ $warehouse->car_category }}</td>
                    <td>{{ $warehouse->manufacturer }}</td>
                    <td>{{ $warehouse->quantity }}</td>
                    <td>{{ $warehouse->purchase_price }}</td>
                    <td>{{ $warehouse->sale_price }}</td>
                    <td>
                        @if($warehouse->image_path)
                            <img src="{{ asset('storage/' . $warehouse->image_path) }}" alt="Part Image" width="60">
                        @else
                            لا توجد صورة
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
