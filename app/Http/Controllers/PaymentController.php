<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('payments.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'PaymentDate' => 'required|date',
            'PaymentAmount' => 'required|numeric|min:0',
            'PaymentMethod' => 'required|in:credit_card,paypal,bank_transfer,cash',
            'PaymentStatus' => 'required|in:pending,completed,failed,refunded',
            'OrderID' => 'required|exists:orders,id',
            'PayerName' => 'required|string|max:255',
            'Currency' => 'required|string|max:255',
        ]);

        Payment::create($request->all());
        return redirect()->route('payments.index')->with('success', 'تمت إضافة الدفع بنجاح.');
    }

    public function edit(Payment $payment)
    {
        $orders = Order::all();
        return view('payments.edit', compact('payment', 'orders'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'PaymentDate' => 'required|date',
            'PaymentAmount' => 'required|numeric|min:0',
            'PaymentMethod' => 'required|in:credit_card,paypal,bank_transfer,cash',
            'PaymentStatus' => 'required|in:pending,completed,failed,refunded',
            'OrderID' => 'required|exists:orders,id',
            'PayerName' => 'required|string|max:255',
            'Currency' => 'required|string|max:255',
        ]);

        $payment->update($request->all());
        return redirect()->route('payments.index')->with('success', 'تم تعديل الدفع بنجاح.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'تم حذف الدفع بنجاح.');
    }
}

