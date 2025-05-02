@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🧾 إضافة فاتورة جديدة</h2>
    <form action="{{ route('invoices.store') }}" method="POST" id="invoiceForm">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label>📌 رقم الفاتورة:</label>
                    <input type="text" name="InvoiceNumber" class="form-control" placeholder="أدخل رقم الفاتورة" required>
                </div>

                <div class="form-group mb-3">
                    <label>📌 نوع الفاتورة:</label>
                    <select name="InvoiceType" class="form-control" required>
                        <option value="sale">🛒 بيع</option>
                        <option value="purchase">🛍️ شراء</option>
                        <option value="refund">🔄 استرداد</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>👤 العميل:</label>
                    <select name="CustomerID" class="form-control" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>📅 تاريخ الفاتورة:</label>
                    <input type="date" name="InvoiceDate" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>⏳ تاريخ الاستحقاق:</label>
                    <input type="date" name="DueDate" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label>💳 حالة الدفع:</label>
                    <select name="PaymentStatus" class="form-control" required>
                        <option value="paid">✅ مدفوع</option>
                        <option value="pending">⏳ معلق</option>
                        <option value="overdue">⚠️ متأخر</option>
                        <option value="canceled">❌ ملغى</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>💰 المبلغ الصافي:</label>
                    <input type="number" step="0.01" name="NetAmount" id="NetAmount" class="form-control" placeholder="المبلغ بدون الضريبة" required>
                </div>

                <div class="form-group mb-3">
                    <label>🧾 الضريبة (%):</label>
                    <input type="number" step="0.01" name="TaxAmount" id="TaxAmount" class="form-control" placeholder="أدخل نسبة الضريبة" required>
                </div>

                <div class="form-group mb-3">
                    <label>🎁 الخصم (%):</label>
                    <input type="number" step="0.01" name="DiscountAmount" id="DiscountAmount" class="form-control" placeholder="أدخل نسبة الخصم" required>
                </div>

                <div class="form-group mb-3">
                    <label>💲 الإجمالي:</label>
                    <input type="number" step="0.01" name="TotalAmount" id="TotalAmount" class="form-control" readonly>
                </div>

                <div class="form-group mb-3">
                    <label>🌎 العملة:</label>
                    <input type="text" name="Currency" class="form-control" value="SAR" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3 w-100">💾 إضافة الفاتورة</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    function calculateTotal() {
        let netAmount = parseFloat(document.getElementById("NetAmount").value) || 0;
        let taxRate = parseFloat(document.getElementById("TaxAmount").value) || 0;
        let discountRate = parseFloat(document.getElementById("DiscountAmount").value) || 0;

        let taxAmount = (netAmount * taxRate) / 100;
        let discountAmount = (netAmount * discountRate) / 100;
        let totalAmount = netAmount + taxAmount - discountAmount;

        document.getElementById("TotalAmount").value = totalAmount.toFixed(2);
    }

    document.getElementById("NetAmount").addEventListener("input", calculateTotal);
    document.getElementById("TaxAmount").addEventListener("input", calculateTotal);
    document.getElementById("DiscountAmount").addEventListener("input", calculateTotal);
});
</script>
@endsection
