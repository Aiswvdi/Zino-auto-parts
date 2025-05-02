@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- بطاقة الإضافة -->
            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-gradient-primary text-white rounded-top-4">
                    <h4 class="mb-0">إضافة مورد جديد</h4>
                </div>
                <div class="card-body">
                    <!-- نموذج الإضافة -->
                    <form action="{{ route('suppliers.store') }}" method="POST">
                        @csrf

                        @include('suppliers.form')

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-success">إضافة</button>
                            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
