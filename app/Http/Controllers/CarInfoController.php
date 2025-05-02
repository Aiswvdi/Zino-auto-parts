<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarCategory;

class CarInfoController extends Controller
{
    public function create()
    {
        return view('car_info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_model' => 'required|string|max:255',
            'car_category' => 'required|string|max:255',
        ]);

        // تخزين البيانات أو طباعتها للتجربة
        return back()->with('success', 'تم حفظ البيانات بنجاح!');
    }
}
