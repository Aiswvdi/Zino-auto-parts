@extends('layouts.app')

@section('content')
    <h2>تعديل الدفع</h2>

    <form action="{{ route('supplier_payments.update', $supplierPayment->PaymentID) }}" method="POST">
        @method('PUT')
        @include('supplier_payments.form')
    </form>
@endsection
