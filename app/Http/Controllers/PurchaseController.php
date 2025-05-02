<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;

class PurchaseController extends Controller
{
    public function buy($id)
    {
        $image = ProductImage::with('product')->findOrFail($id);

        return view('purchase.buy', compact('image'));
    }
}
