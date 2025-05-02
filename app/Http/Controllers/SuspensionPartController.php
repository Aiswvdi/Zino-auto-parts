<?php

namespace App\Http\Controllers;

use App\Models\SuspensionPart;
use Illuminate\Http\Request;

class SuspensionPartController extends Controller
{
    // عرض جميع قطع التعليق
    public function index(Request $request)
    {
        // استعلام للحصول على الأنواع الفريدة من قطع التعليق
        $types = SuspensionPart::distinct()->pluck('type');

        // استعلام للحصول على قطع التعليق مع إمكانية تصفيتها حسب النوع
        $suspensionParts = SuspensionPart::when($request->type, function($query) use ($request) {
            return $query->where('type', $request->type);
        })->get();

        return view('suspension-parts.index', compact('suspensionParts', 'types'));
    }

    // عرض صفحة إضافة قطعة جديدة
    public function create()
    {
        return view('suspension-parts.create');
    }

    // تخزين قطعة جديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('suspension_parts', 'public');
        }

        SuspensionPart::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('suspension-parts.index');
    }

    // عرض تفاصيل قطعة معينة
    public function show($id)
    {
        $suspensionPart = SuspensionPart::findOrFail($id);
        return view('suspension-parts.show', compact('suspensionPart'));
    }

    // عرض صفحة تعديل قطعة
    public function edit($id)
    {
        $suspensionPart = SuspensionPart::findOrFail($id);
        return view('suspension-parts.edit', compact('suspensionPart'));
    }

    // تحديث قطعة معينة في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $suspensionPart = SuspensionPart::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('suspension_parts', 'public');
            $suspensionPart->image = $imagePath;
        }

        $suspensionPart->name = $request->name;
        $suspensionPart->description = $request->description;
        $suspensionPart->price = $request->price;
        $suspensionPart->save();

        return redirect()->route('suspension-parts.index');
    }

    // حذف قطعة من قاعدة البيانات
    public function destroy($id)
    {
        SuspensionPart::destroy($id);
        return redirect()->route('suspension-parts.index');
    }
}
