<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // عرض جميع العملاء
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // عرض نموذج إضافة عميل جديد
    public function create()
    {
        return view('customers.create');
    }

    // تخزين العميل الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'FullName' => 'required|string|max:255',
            'Email' => 'required|email|unique:customers',
            'Phone' => 'required|string|max:20',
            'Address' => 'nullable|string',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'تمت إضافة العميل بنجاح!');
    }

    // عرض بيانات عميل معين
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    // عرض نموذج تعديل العميل
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // تحديث بيانات العميل في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $request->validate([
            'FullName' => 'required|string|max:255',
            'Email' => 'required|email|unique:customers,Email,' . $id,
            'Phone' => 'required|string|max:20',
            'Address' => 'nullable|string',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'تم تحديث بيانات العميل بنجاح!');
    }

    // حذف العميل من قاعدة البيانات
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'تم حذف العميل بنجاح!');
    }
}

