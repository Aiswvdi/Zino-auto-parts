<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        // هنا يتم إضافة فئات السيارات والشركات لتستخدمها في القوائم المنسدلة
        $carCategories = \App\Models\CarCategory::all();
        $carBrands = \App\Models\CarBrand::all();
        return view('products.create', compact('suppliers', 'carCategories', 'carBrands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string|max:255',
            'supplierID' => 'required|exists:suppliers,id',
            'car_category' => 'nullable|string|max:255',
            'car_brand' => 'nullable|string|max:255',
            'car_model' => 'nullable|string|max:255',
            'product_brand' => 'nullable|string|max:255',
            'is_original' => 'nullable|boolean',
        ]);

        // تخزين المنتج مع جميع المعلومات الجديدة
        Product::create([
            'name' => $request->name,
            'details' => $request->details,
            'supplierID' => $request->supplierID,
            'car_category' => $request->car_category,
            'car_brand' => $request->car_brand,
            'car_model' => $request->car_model,
            'product_brand' => $request->product_brand,
            'is_original' => $request->is_original,
        ]);

        return redirect()->route('products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $suppliers = Supplier::all();
        // إضافة فئات السيارات والشركات المصنعة
        $carCategories = \App\Models\CarCategory::all();
        $carBrands = \App\Models\CarBrand::all();
        return view('products.edit', compact('product', 'suppliers', 'carCategories', 'carBrands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string|max:255',
            'supplierID' => 'required|exists:suppliers,id',
            'car_category' => 'nullable|string|max:255',
            'car_brand' => 'nullable|string|max:255',
            'car_model' => 'nullable|string|max:255',
            'product_brand' => 'nullable|string|max:255',
            'is_original' => 'nullable|boolean',
        ]);

        // تحديث المنتج مع البيانات الجديدة
        $product->update([
            'name' => $request->name,
            'details' => $request->details,
            'supplierID' => $request->supplierID,
            'car_category' => $request->car_category,
            'car_brand' => $request->car_brand,
            'car_model' => $request->car_model,
            'product_brand' => $request->product_brand,
            'is_original' => $request->is_original,
        ]);

        return redirect()->route('products.index')->with('success', 'تم تحديث المنتج بنجاح');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'تم حذف المنتج');
    }
}
