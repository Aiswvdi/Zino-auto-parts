<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('product')->get();
        return view('inventory.index', compact('inventories'));
    }

    public function create()
    {
        $products = Product::all();
        return view('inventory.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductID' => 'required|exists:products,id',
            'Quantity' => 'required|integer',
            'Location' => 'required|string',
            'CostPrice' => 'required|numeric',
            'SellingPrice' => 'required|numeric',
            'Status' => 'required|boolean',
        ]);

        Inventory::create($request->all());
        return redirect()->route('inventory.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        $products = Product::all();
        return view('inventory.edit', compact('inventory', 'products'));
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());

        return redirect()->route('inventory.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();
        return redirect()->route('inventory.index')->with('success', 'تم الحذف بنجاح');
    }
}

