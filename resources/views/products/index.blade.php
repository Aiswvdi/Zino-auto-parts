@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">📦 قائمة المنتجات</h2>
        <a href="{{ route('products.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> إضافة منتج جديد
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>✔ نجاح!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>📌 الاسم</th>
                        <th>📝 التفاصيل</th>
                        <th>🚗 فئة السيارة</th>
                        <th>🏭 الشركة المصنعة للسيارة</th>
                        <th>📅 الموديل</th>
                        <th>🏢 الشركة المصنعة للمنتج</th>
                        <th>📦 نوع المنتج</th>
                        <th>🏢 المورد</th>
                        <th>⚙ الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->details }}</td>
                        <td>{{ $product->car_category ?? 'غير متوفر' }}</td>
                        <td>{{ $product->car_manufacturer ?? 'غير متوفر' }}</td>
                        <td>{{ $product->car_model ?? 'غير متوفر' }}</td>
                        <td>{{ $product->product_manufacturer ?? 'غير متوفر' }}</td>
                        <td>{{ $product->product_type ?? 'غير متوفر' }}</td>
                        <td>{{ $product->supplier->SupplierName ?? 'غير معروف' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('⚠ هل أنت متأكد من الحذف؟')">
                                    <i class="fas fa-trash"></i> حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
