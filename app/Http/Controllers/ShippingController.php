<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\Order;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        $shippings = Shipping::with('order')->latest()->get();
        return view('shippings.index', compact('shippings'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('shippings.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'orderID' => 'required|exists:orders,id',
            'trackingNumber' => 'nullable|string|max:255',
            'carrier' => 'nullable|string|max:255',
            'shippingAddress' => 'required|string',
        ]);

        Shipping::create($request->all());
        return redirect()->route('shippings.index')->with('success', 'تمت إضافة الشحنة بنجاح');
    }

    public function edit($id)
    {
        $shipping = Shipping::findOrFail($id);
        $orders = Order::all();
        return view('shippings.edit', compact('shipping', 'orders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'orderID' => 'required|exists:orders,id',
            'trackingNumber' => 'nullable|string|max:255',
            'carrier' => 'nullable|string|max:255',
            'shippingAddress' => 'required|string',
        ]);

        $shipping = Shipping::findOrFail($id);
        $shipping->update($request->all());

        return redirect()->route('shippings.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy($id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->delete();
        return redirect()->route('shippings.index')->with('success', 'تم الحذف بنجاح');
    }
}

