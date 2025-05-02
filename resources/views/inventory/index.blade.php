@extends('layouts.app')
@section('content')
<div class="container">
    <h2>المخزون</h2>
    <a href="{{ route('inventory.create') }}" class="btn btn-success mb-3">إضافة عنصر جديد</a>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>المنتج</th>
                <th>الكمية</th>
                <th>الموقع</th>
                <th>سعر التكلفة</th>
                <th>سعر البيع</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'غير معروف' }}</td>
                    <td>{{ $item->Quantity }}</td>
                    <td>{{ $item->Location }}</td>
                    <td>{{ $item->CostPrice }}</td>
                    <td>{{ $item->SellingPrice }}</td>
                    <td>{{ $item->Status ? 'نشط' : 'غير نشط' }}</td>
                    <td>
                        <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
