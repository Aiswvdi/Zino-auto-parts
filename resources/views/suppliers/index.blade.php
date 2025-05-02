@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>قائمة الموردين</h2>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">إضافة مورد جديد</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الشخص المسؤول</th>
                    <th>رقم الهاتف</th>
                    <th>البريد الإلكتروني</th>
                    <th>الموقع الإلكتروني</th>
                    <th>المدينة</th>
                    <th>الدولة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->SupplierName }}</td>
                        <td>{{ $supplier->ContactPerson }}</td>
                        <td>{{ $supplier->PhoneNumber }}</td>
                        <td>{{ $supplier->Email }}</td>
                        <td><a href="{{ $supplier->CompanyWebsite }}" target="_blank">{{ $supplier->CompanyWebsite }}</a></td>
                        <td>{{ $supplier->City }}</td>
                        <td>{{ $supplier->Country }}</td>
                        <td>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline-block;">
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
