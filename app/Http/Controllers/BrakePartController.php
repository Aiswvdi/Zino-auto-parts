<?php

namespace App\Http\Controllers;

use App\Models\BrakePart;
use Illuminate\Http\Request;

class BrakePartController extends Controller
{
    // عرض قائمة قطع الفرامل
    public function index()
    {
        $brakeParts = BrakePart::all(); // أو استخدام paginate() إذا كنت تريد تقسيم الصفحات
        return view('brake-parts.index', compact('brakeParts'));
    }

    // عرض صفحة إضافة القطعة
    public function create()
    {
        return view('brake-parts.create');
    }

    // حفظ القطعة الجديدة في قاعدة البيانات
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // رفع الصورة إذا كانت موجودة
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brake_parts', 'public');
        }

        // إنشاء القطعة الجديدة
        BrakePart::create([
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('brake-parts.index')->with('success', 'تم إضافة القطعة بنجاح!');
    }

    // عرض تفاصيل القطعة
    public function show($id)
    {
        $brakePart = BrakePart::findOrFail($id);
        return view('brake-parts.show', compact('brakePart'));
    }

    // عرض صفحة تعديل القطعة
    public function edit($id)
    {
        $brakePart = BrakePart::findOrFail($id);
        return view('brake-parts.edit', compact('brakePart'));
    }

    // تحديث القطعة
    public function update(Request $request, $id)
    {
        $brakePart = BrakePart::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $brakePart->update([
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'price' => $request->price,
            'description' => $request->description,
            // تحديث الصورة إذا تم رفع صورة جديدة
            'image' => $request->hasFile('image') ? $request->file('image')->store('brake_parts', 'public') : $brakePart->image,
        ]);

        return redirect()->route('brake-parts.index')->with('success', 'تم تحديث القطعة بنجاح!');
    }

    // حذف القطعة
    public function destroy($id)
    {
        $brakePart = BrakePart::findOrFail($id);
        $brakePart->delete();

        return redirect()->route('brake-parts.index')->with('success', 'تم حذف القطعة بنجاح!');
    }
}

