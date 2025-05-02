@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">تعديل المنتج</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('products.form')

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-edit"></i> تحديث المنتج
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> العودة للقائمة
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
