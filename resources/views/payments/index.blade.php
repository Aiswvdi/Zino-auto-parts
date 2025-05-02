@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm p-4 rounded-3 border-0 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary"><i class="fas fa-money-check-alt"></i> قائمة المدفوعات</h2>
            <a href="{{ route('payments.create') }}" class="btn btn-primary btn-lg rounded-pill">
                <i class="fas fa-plus"></i> إضافة دفعة جديدة
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-light">
                    <tr class="text-primary">
                        <th><i class="fas fa-calendar-alt"></i> التاريخ</th>
                        <th><i class="fas fa-dollar-sign"></i> المبلغ</th>
                        <th><i class="fas fa-credit-card"></i> طريقة الدفع</th>
                        <th><i class="fas fa-info-circle"></i> الحالة</th>
                        <th><i class="fas fa-receipt"></i> الطلب</th>
                        <th><i class="fas fa-user"></i> اسم الدافع</th>
                        <th><i class="fas fa-cogs"></i> الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->PaymentDate }}</td>
                        <td>{{ $payment->PaymentAmount }} {{ $payment->Currency }}</td>
                        <td>{{ ucfirst($payment->PaymentMethod) }}</td>
                        <td>
                            <span class="badge
                                {{ $payment->PaymentStatus == 'completed' ? 'bg-success text-white' :
                                   ($payment->PaymentStatus == 'pending' ? 'bg-warning text-dark' :
                                   ($payment->PaymentStatus == 'failed' ? 'bg-danger text-white' : 'bg-info text-white')) }}">
                                {{ ucfirst($payment->PaymentStatus) }}
                            </span>
                        </td>
                        <td>{{ $payment->order->id }}</td>
                        <td>{{ $payment->PayerName }}</td>
                        <td>
                            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm rounded-pill">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(this)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill">
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

<script>
function confirmDelete(form) {
    event.preventDefault();
    Swal.fire({
        title: "هل أنت متأكد؟",
        text: "لن تتمكن من استعادة هذه الدفعة بعد الحذف!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "نعم، احذف!",
        cancelButtonText: "إلغاء"
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
</script>

<!-- تضمين مكتبة SweetAlert2 لتحسين نوافذ التأكيد -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
