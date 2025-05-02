<?php

namespace App\Http\Controllers;

use App\Models\ReturnOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    // عرض جميع المرتجعات
    public function index()
    {
        $returns = ReturnOrder::with('order')->get();
        return view('returns.index', compact('returns'));
    }

    // عرض نموذج إنشاء مرتجع جديد
    public function create()
    {
        $orders = Order::all();
        return view('returns.create', compact('orders'));
    }

    // تخزين بيانات المرتجع الجديد
    public function store(Request $request)
    {
        $request->validate([
            'OrderID' => 'required|exists:orders,id',
            'returnReason' => 'nullable|string',
            'refundAmount' => 'required|numeric|min:0',
        ]);

        ReturnOrder::create([
            'OrderID' => $request->OrderID,
            'returnReason' => $request->returnReason,
            'refundAmount' => $request->refundAmount,
            'returnDate' => now()
        ]);

        return redirect()->route('returns.index')->with('success', 'تمت إضافة المرتجع بنجاح');
    }

    // تعديل المرتجع
    public function edit(ReturnOrder $return)
    {
        $orders = Order::all();
        return view('returns.edit', compact('return', 'orders'));
    }

    // تحديث بيانات المرتجع
    public function update(Request $request, ReturnOrder $return)
    {
        $request->validate([
            'OrderID' => 'required|exists:orders,id',
            'returnReason' => 'nullable|string',
            'refundAmount' => 'required|numeric|min:0',
        ]);

        $return->update($request->all());

        return redirect()->route('returns.index')->with('success', 'تم تحديث المرتجع بنجاح');
    }

    // حذف المرتجع
    public function destroy(ReturnOrder $return)
    {
        $return->delete();
        return redirect()->route('returns.index')->with('success', 'تم حذف المرتجع بنجاح');
    }
}
