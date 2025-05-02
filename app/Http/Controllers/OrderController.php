<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('OrderDate', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'UserID' => 'required|exists:users,id',
            'TotalAmount' => 'required|numeric|min:0',
            'PaymentStatus' => 'required|in:Pending,Paid,Failed,Refunded',
            'OrderStatus' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
            'ShippingAddress' => 'required|string',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'تمت إضافة الطلب بنجاح!');
    }

    public function edit(Order $order)
    {
        $users = User::all();
        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'UserID' => 'required|exists:users,id',
            'TotalAmount' => 'required|numeric|min:0',
            'PaymentStatus' => 'required|in:Pending,Paid,Failed,Refunded',
            'OrderStatus' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
            'ShippingAddress' => 'required|string',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'تم تحديث الطلب بنجاح!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'تم حذف الطلب بنجاح!');
    }
}
