<?php

namespace App\Http\Controllers;

use App\Models\SupplierPayment;
use App\Models\Supplier;
use App\Models\Invoice;
use Illuminate\Http\Request;

class SupplierPaymentController extends Controller
{
    public function index()
    {
        $payments = SupplierPayment::with(['supplier', 'invoice'])->get();
        return view('supplier_payments.index', compact('payments'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $invoices = Invoice::all();
        return view('supplier_payments.create', compact('suppliers', 'invoices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'SupplierID' => 'required|exists:suppliers,id',
            'InvoiceID' => 'required|exists:invoices,id',
            'AmountPaid' => 'required|numeric',
            'PaymentMethod' => 'required|string|max:50',
            'PaymentDate' => 'required|date',
            'Status' => 'required|in:Pending,Completed,Failed',
        ]);

        SupplierPayment::create($request->all());

        return redirect()->route('supplier_payments.index')->with('success', 'تمت إضافة الدفع بنجاح.');
    }

    public function show(SupplierPayment $supplierPayment)
    {
        return view('supplier_payments.show', compact('supplierPayment'));
    }

    public function edit(SupplierPayment $supplierPayment)
    {
        $suppliers = Supplier::all();
        $invoices = Invoice::all();
        return view('supplier_payments.edit', compact('supplierPayment', 'suppliers', 'invoices'));
    }

    public function update(Request $request, SupplierPayment $supplierPayment)
    {
        $request->validate([
            'SupplierID' => 'required|exists:suppliers,id',
            'InvoiceID' => 'required|exists:invoices,id',
            'AmountPaid' => 'required|numeric',
            'PaymentMethod' => 'required|string|max:50',
            'PaymentDate' => 'required|date',
            'Status' => 'required|in:Pending,Completed,Failed',
        ]);

        $supplierPayment->update($request->all());

        return redirect()->route('supplier_payments.index')->with('success', 'تم تحديث الدفع بنجاح.');
    }

    public function destroy(SupplierPayment $supplierPayment)
    {
        $supplierPayment->delete();
        return redirect()->route('supplier_payments.index')->with('success', 'تم حذف الدفع.');
    }
}

