<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // عرض جميع الفئات
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // عرض نموذج إضافة فئة جديدة
    public function create()
    {
        return view('categories.create');
    }

    // تخزين فئة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'CategoryName' => 'required|max:255',
            'Status' => 'required|integer',
        ]);

        Category::create([
            'CategoryName' => $request->CategoryName,
            'Status' => $request->Status,
        ]);

        return redirect()->route('categories.index')->with('success', 'تمت إضافة الفئة بنجاح');
    }

    // عرض بيانات فئة معينة
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // عرض نموذج تعديل فئة
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // تحديث بيانات فئة
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'CategoryName' => 'required|max:255',
            'Status' => 'required|integer',
        ]);

        $category->update([
            'CategoryName' => $request->CategoryName,
            'Status' => $request->Status,
        ]);

        return redirect()->route('categories.index')->with('success', 'تم تحديث الفئة بنجاح');
    }

    // حذف فئة
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'تم حذف الفئة بنجاح');
    }
}

