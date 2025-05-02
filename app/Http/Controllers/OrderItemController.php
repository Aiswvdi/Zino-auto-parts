<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    // عرض جميع عناصر الطلب
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])->get();
        return view('order_items.index', compact('orderItems'));
    }

    // عرض نموذج إنشاء عنصر طلب جديد
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_items.create', compact('orders', 'products'));
    }

    // تخزين بيانات عنصر الطلب الجديد
    public function store(Request $request)
    {
        $request->validate([
            'OrderID' => 'required|exists:orders,id',
            'ProductID' => 'required|exists:products,id',
            'Quantity' => 'required|integer|min:1',
            'Price' => 'required|numeric|min:0',
        ]);

        OrderItem::create($request->all());

        return redirect()->route('order_items.index')->with('success', 'تمت إضافة العنصر بنجاح');
    }

    // تعديل عنصر الطلب
    public function edit(OrderItem $orderItem)
    {
        $orders = Order::all();
        $products = Product::all();
        return view('order_items.edit', compact('orderItem', 'orders', 'products'));
    }

    // تحديث بيانات عنصر الطلب
    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'OrderID' => 'required|exists:orders,id',
            'ProductID' => 'required|exists:products,id',
            'Quantity' => 'required|integer|min:1',
            'Price' => 'required|numeric|min:0',
        ]);

        $orderItem->update($request->all());

        return redirect()->route('order_items.index')->with('success', 'تم تحديث العنصر بنجاح');
    }

    // حذف عنصر الطلب
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('order_items.index')->with('success', 'تم حذف العنصر بنجاح');
    }
}
