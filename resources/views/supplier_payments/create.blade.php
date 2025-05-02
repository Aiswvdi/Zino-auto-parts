@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">إضافة دفع جديد</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>حدثت أخطاء:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('supplier_payments.store') }}" method="POST" class="card card-body shadow-sm">
            @include('supplier_payments.form')
        </form>
    </div>
@endsection
