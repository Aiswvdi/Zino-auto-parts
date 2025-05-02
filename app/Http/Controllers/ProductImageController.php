<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index()
    {
        $images = ProductImage::with('product')->get();
        return view('product_images.index', compact('images'));
    }

    public function create()
    {
        $products = Product::all();
        return view('product_images.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'required|image',
            'price' => 'nullable|numeric',
        ]);

        $path = $request->file('image_path')->store('product_images', 'public');
        $data['image_path'] = $path;

        ProductImage::create($data);
        return redirect()->route('product_images.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(ProductImage $productImage)
    {
        $products = Product::all();
        return view('product_images.edit', compact('productImage', 'products'));
    }

    public function update(Request $request, ProductImage $productImage)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'nullable|image',
            'price' => 'nullable|numeric',
        ]);

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('product_images', 'public');
            $data['image_path'] = $path;
        }

        $productImage->update($data);
        return redirect()->route('product_images.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return redirect()->back()->with('success', 'تم الحذف');
    }

    // ✅ الدالة الجديدة لعرض صفحة custom
    public function customView()
    {
        $images = ProductImage::with('product')->get();
        return view('product_images.custom', compact('images'));
    }

    public function show($id)
    {
        // استرجاع صورة المنتج مع المنتج المرتبط باستخدام الـ id
        $image = ProductImage::with('product')->findOrFail($id);

        // إعادة العرض مع إرسال البيانات
        return view('product_images.show', compact('image'));
    }

    // ✅ الدالة الجديدة لزيادة الكمية وتحديث السعر بناءً على الكمية
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);
        $quantity = $request->quantity;

        // حساب السعر بناءً على الكمية
        $totalPrice = $product->price * $quantity;

        // هنا يمكنك تحديث السعر الإجمالي في جدول الـ Product أو أي جدول آخر حسب حاجتك
        // إذا أردت تخزين السعر الإجمالي في المنتج:
        $product->update(['total_price' => $totalPrice]);

        // إرجاع رد يحتوي على السعر الجديد
        return response()->json(['success' => true, 'total_price' => $totalPrice]);
    }
}
