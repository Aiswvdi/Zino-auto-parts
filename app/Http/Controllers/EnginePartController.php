<?php

namespace App\Http\Controllers;

use App\Models\EnginePart;
use Illuminate\Http\Request;

class EnginePartController extends Controller
{
    public function index(Request $request)
{
    $query = EnginePart::query();

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    $engineParts = $query->get();

    $types = EnginePart::select('type')->distinct()->pluck('type');

    return view('engine_parts.index', compact('engineParts', 'types'));
}




    public function create()
    {
        return view('engine_parts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'manufacturer' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'type' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // تأكد من تحديد امتدادات الصور المسموح بها
    ]);

    // حفظ الصورة في التخزين
    $imagePath = $request->file('image')->store('engine_parts', 'public');

    // إنشاء القطعة
    EnginePart::create([
        'name' => $request->name,
        'manufacturer' => $request->manufacturer,
        'price' => $request->price,
        'description' => $request->description,
        'type' => $request->type,
        'image' => $imagePath,
    ]);

    return redirect()->route('engine_parts.index')->with('success', 'تم إضافة القطعة بنجاح!');
}


    public function show(EnginePart $enginePart)
    {
        return view('engine_parts.show', compact('enginePart'));
    }

    public function edit(EnginePart $enginePart)
    {
        return view('engine_parts.edit', compact('enginePart'));
    }

    public function update(Request $request, EnginePart $enginePart)
    {
        $data = $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('engine_parts', 'public');
        }

        $enginePart->update($data);
        return redirect()->route('engine_parts.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(EnginePart $enginePart)
    {
        $enginePart->delete();
        return redirect()->route('engine_parts.index')->with('success', 'تم الحذف بنجاح');
    }
}

