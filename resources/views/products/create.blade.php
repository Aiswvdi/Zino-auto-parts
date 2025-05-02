@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">إضافة منتج جديد</h2>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            @include('products.form')

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> حفظ المنتج
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> العودة للقائمة
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
