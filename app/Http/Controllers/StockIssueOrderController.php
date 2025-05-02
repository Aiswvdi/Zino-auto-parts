<?php

namespace App\Http\Controllers;

use App\Models\StockIssueOrder;
use App\Models\StockIssueItem;
use Illuminate\Http\Request;

class StockIssueOrderController extends Controller
{
    public function index()
    {
        $orders = StockIssueOrder::withCount('items')->latest()->get();
        return view('stock_issue_orders.index', compact('orders'));
    }

    public function create()
    {
        return view('stock_issue_orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'issue_number' => 'required|unique:stock_issue_orders',
            'issue_date' => 'required|date',
            'issued_by' => 'required',
            'items.*.part_number' => 'required',
            'items.*.part_type' => 'required',
            'items.*.part_category' => 'required',
            'items.*.issued_quantity' => 'required|integer',
        ]);

        $order = StockIssueOrder::create($request->only('issue_number', 'issue_date', 'issued_by', 'approved_by', 'notes'));

        foreach ($request->items as $item) {
            $order->items()->create($item);
        }

        return redirect()->route('stock_issues.index')->with('success', 'تم إنشاء أمر الصرف بنجاح');
    }

    public function show(StockIssueOrder $stock_issue_order)
    {
        return view('stock_issue_orders.show', compact('stock_issue_order'));
    }

    public function edit(StockIssueOrder $stock_issue_order)
    {
        return view('stock_issue_orders.edit', compact('stock_issue_order'));
    }

    public function update(Request $request, StockIssueOrder $stock_issue_order)
    {
        $stock_issue_order->update($request->only('issue_number', 'issue_date', 'issued_by', 'approved_by', 'notes'));
        return redirect()->route('stock_issues.index')->with('success', 'تم تعديل أمر الصرف');
    }

    public function destroy(StockIssueOrder $stock_issue_order)
    {
        $stock_issue_order->delete();
        return redirect()->route('stock_issues.index')->with('success', 'تم حذف أمر الصرف');
    }
}
