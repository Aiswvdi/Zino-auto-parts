@extends('layouts.app')

@section('content')

@csrf

<div class="mb-3">
    <label for="SupplierID" class="form-label">المورد:</label>
    <select name="SupplierID" id="SupplierID" class="form-select" required>
        <option value="">-- اختر المورد --</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}"
                {{ (isset($supplierPayment) && $supplierPayment->SupplierID == $supplier->id) ? 'selected' : '' }}>
                {{ $supplier->name }}
            </option>
        @endforeach
    </select>
    @error('SupplierID')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="InvoiceID" class="form-label">الفاتورة:</label>
    <select name="InvoiceID" id="InvoiceID" class="form-select" required>
        <option value="">-- اختر الفاتورة --</option>
        @foreach($invoices as $invoice)
            <option value="{{ $invoice->id }}"
                {{ (isset($supplierPayment) && $supplierPayment->InvoiceID == $invoice->id) ? 'selected' : '' }}>
                {{ $invoice->InvoiceNumber }}
            </option>
        @endforeach
    </select>
    @error('InvoiceID')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="AmountPaid" class="form-label">المبلغ المدفوع:</label>
    <input type="number" step="0.01" name="AmountPaid" id="AmountPaid" class="form-control"
        value="{{ $supplierPayment->AmountPaid ?? old('AmountPaid') }}" required>
    @error('AmountPaid')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="PaymentMethod" class="form-label">طريقة الدفع:</label>
    <input type="text" name="PaymentMethod" id="PaymentMethod" class="form-control"
        value="{{ $supplierPayment->PaymentMethod ?? old('PaymentMethod') }}" required>
    @error('PaymentMethod')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="TransactionReference" class="form-label">رقم المعاملة (اختياري):</label>
    <input type="text" name="TransactionReference" id="TransactionReference" class="form-control"
        value="{{ $supplierPayment->TransactionReference ?? old('TransactionReference') }}">
    @error('TransactionReference')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="PaymentDate" class="form-label">تاريخ الدفع:</label>
    <input type="datetime-local" name="PaymentDate" id="PaymentDate" class="form-control"
        value="{{ isset($supplierPayment) ? \Carbon\Carbon::parse($supplierPayment->PaymentDate)->format('Y-m-d\TH:i') : old('PaymentDate') }}" required>
    @error('PaymentDate')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="Status" class="form-label">الحالة:</label>
    <select name="Status" id="Status" class="form-select" required>
        @foreach(['Pending' => 'قيد الانتظار', 'Completed' => 'مكتمل', 'Failed' => 'فشل'] as $value => $label)
            <option value="{{ $value }}"
                {{ (isset($supplierPayment) && $supplierPayment->Status == $value) ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('Status')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="Notes" class="form-label">ملاحظات:</label>
    <textarea name="Notes" id="Notes" class="form-control" rows="3">{{ $supplierPayment->Notes ?? old('Notes') }}</textarea>
    @error('Notes')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-success">حفظ</button>
</div>

