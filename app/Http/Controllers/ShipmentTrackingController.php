<?php

namespace App\Http\Controllers;

use App\Models\ShipmentTracking;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShipmentTrackingController extends Controller
{
    public function index()
    {
        $shipments = ShipmentTracking::with(['order', 'shipping'])->get();
        return view('shipment_tracking.index', compact('shipments'));
    }

    public function create()
    {
        $orders = Order::all();
        $shippings = Shipping::all();
        return view('shipment_tracking.create', compact('orders', 'shippings'));
    }

    public function store(Request $request)
    {
        ShipmentTracking::create($request->all());
        return redirect()->route('shipment_tracking.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(ShipmentTracking $shipment_tracking)
    {
        $orders = Order::all();
        $shippings = Shipping::all();
        return view('shipment_tracking.edit', compact('shipment_tracking', 'orders', 'shippings'));
    }

    public function update(Request $request, ShipmentTracking $shipment_tracking)
    {
        $shipment_tracking->update($request->all());
        return redirect()->route('shipment_tracking.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(ShipmentTracking $shipment_tracking)
    {
        $shipment_tracking->delete();
        return redirect()->route('shipment_tracking.index')->with('success', 'تم الحذف بنجاح');
    }
}

