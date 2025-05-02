<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // عرض جميع الفواتير
    public function index()
    {
        $invoices = Invoice::with('customer')->get();
        return view('invoices.index', compact('invoices'));
    }

    // عرض نموذج إنشاء فاتورة جديدة
    public function create()
    {
        $customers = Customer::all();
        return view('invoices.create', compact('customers'));
    }

    // تخزين فاتورة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'InvoiceNumber' => 'required|unique:invoices',
            'InvoiceType' => 'required|in:sale,purchase,refund',
            'CustomerID' => 'required|exists:customers,id',
            'InvoiceDate' => 'required|date',
            'DueDate' => 'required|date|after_or_equal:InvoiceDate',
            'PaymentStatus' => 'required|in:paid,pending,overdue,canceled',
            'NetAmount' => 'required|numeric|min:0',
            'TaxAmount' => 'required|numeric|min:0',
            'DiscountAmount' => 'required|numeric|min:0',
            'TotalAmount' => 'required|numeric|min:0',
            'Currency' => 'required|string',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices.index')->with('success', 'تمت إضافة الفاتورة بنجاح');
    }

    // عرض بيانات فاتورة معينة
    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    // عرض نموذج تعديل فاتورة
    public function edit($id) {
        $invoice = Invoice::findOrFail($id);
        $customers = Customer::all();

        return view('invoices.edit', compact('invoice', 'customers'));
    }

    // تحديث بيانات الفاتورة
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'InvoiceNumber' => 'required|unique:invoices,InvoiceNumber,' . $invoice->id,
            'InvoiceType' => 'required|in:sale,purchase,refund',
            'CustomerID' => 'required|exists:customers,id',
            'InvoiceDate' => 'required|date',
            'DueDate' => 'required|date|after_or_equal:InvoiceDate',
            'PaymentStatus' => 'required|in:paid,pending,overdue,canceled',
            'NetAmount' => 'required|numeric|min:0',
            'TaxAmount' => 'required|numeric|min:0',
            'DiscountAmount' => 'required|numeric|min:0',
            'TotalAmount' => 'required|numeric|min:0',
            'Currency' => 'required|string',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'تم تحديث الفاتورة بنجاح');
    }

    // حذف فاتورة
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'تم حذف الفاتورة بنجاح');
    }
}

