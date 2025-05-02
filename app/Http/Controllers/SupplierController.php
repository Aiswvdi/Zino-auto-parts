<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create'); // ملف منفصل لإنشاء مورد جديد
    }

    public function store(Request $request)
    {
        $request->validate([
            'SupplierName' => 'required|string|max:255',
            'ContactPerson' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:20',
            'Email' => 'required|email|max:255',
            'CompanyWebsite' => 'nullable|url|max:255',
            'Address' => 'required|string',
            'City' => 'required|string|max:255',
            'Country' => 'required|string|max:255',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'تمت إضافة المورد بنجاح');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier')); // ملف منفصل لتعديل المورد
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'SupplierName' => 'required|string|max:255',
            'ContactPerson' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:20',
            'Email' => 'required|email|max:255',
            'CompanyWebsite' => 'nullable|url|max:255',
            'Address' => 'required|string',
            'City' => 'required|string|max:255',
            'Country' => 'required|string|max:255',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'تم تعديل بيانات المورد بنجاح');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'تم حذف المورد بنجاح');
    }
}
