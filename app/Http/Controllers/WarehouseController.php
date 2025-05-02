<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'part_number' => 'required|unique:warehouses',
            'description' => 'required',
            'car_name' => 'nullable|string|max:255',
            'car_model' => 'nullable|string|max:255',
            'car_category' => 'nullable|string|max:255',
            'manufacturer' => 'required',
            'purchase_date' => 'required|date',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'product_type' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images', 'public');
        }

        Warehouse::create([
            'part_number' => $request->part_number,
            'description' => $request->description,
            'car_name' => $request->car_name,
            'car_model' => $request->car_model,
            'car_category' => $request->car_category,
            'product_type' => $request->product_type,
            'manufacturer' => $request->manufacturer,
            'purchase_date' => $request->purchase_date,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('warehouses.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function show(Warehouse $warehouse)
    {
        return view('warehouses.show', compact('warehouse'));
    }

    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.edit', compact('warehouse'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'part_number' => 'required|unique:warehouses,part_number,' . $warehouse->id,
            'description' => 'required',
            'car_name' => 'nullable|string|max:255',
            'car_model' => 'nullable|string|max:255',
            'car_category' => 'nullable|string|max:255',
            'product_type' => 'nullable|string',
            'manufacturer' => 'required',
            'purchase_date' => 'required|date',
            'quantity' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $warehouse->image_path;

        if ($request->hasFile('image_path')) {
            if ($warehouse->image_path) {
                Storage::delete('public/' . $warehouse->image_path);
            }
            $imagePath = $request->file('image_path')->store('images', 'public');
        }

        $warehouse->update([
            'part_number' => $request->part_number,
            'description' => $request->description,
            'car_name' => $request->car_name,
            'car_model' => $request->car_model,
            'car_category' => $request->car_category,
            'product_type' => $request->product_type,
            'manufacturer' => $request->manufacturer,
            'purchase_date' => $request->purchase_date,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('warehouses.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(Warehouse $warehouse)
    {
        if ($warehouse->image_path) {
            Storage::delete('public/' . $warehouse->image_path);
        }

        $warehouse->delete();
        return redirect()->route('warehouses.index')->with('success', 'تم الحذف بنجاح');
    }
}
