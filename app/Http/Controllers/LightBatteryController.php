<?php

namespace App\Http\Controllers;

use App\Models\LightBattery;
use Illuminate\Http\Request;

class LightBatteryController extends Controller
{
    // عرض جميع قطع الإضاءة والبطاريات
    public function index()
    {
        $lightBatteries = LightBattery::all();
        return view('lights-batteries.index', compact('lightBatteries'));
    }

    // عرض صفحة إضافة قطعة جديدة
    public function create()
    {
        return view('lights-batteries.create');
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
            $imagePath = $request->file('image')->store('light_batteries', 'public');
        }

        LightBattery::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('lights-batteries.index');
    }

    // عرض تفاصيل قطعة معينة
    public function show($id)
    {
        $lightBattery = LightBattery::findOrFail($id);
        return view('lights-batteries.show', compact('lightBattery'));
    }

    // عرض صفحة تعديل قطعة
    public function edit($id)
    {
        $lightBattery = LightBattery::findOrFail($id);
        return view('lights-batteries.edit', compact('lightBattery'));
    }

    // تحديث قطعة معينة في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $lightBattery = LightBattery::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('light_batteries', 'public');
            $lightBattery->image = $imagePath;
        }

        $lightBattery->name = $request->name;
        $lightBattery->description = $request->description;
        $lightBattery->price = $request->price;
        $lightBattery->save();

        return redirect()->route('lights-batteries.index');
    }

    // حذف قطعة من قاعدة البيانات
    public function destroy($id)
    {
        LightBattery::destroy($id);
        return redirect()->route('lights-batteries.index');
    }
}

