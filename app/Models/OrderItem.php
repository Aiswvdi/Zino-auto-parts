<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items'; // اسم الجدول

    public $timestamps = false; // لأنك استخدمت CreatedAt و UpdatedAt بدلاً من created_at و updated_at

    protected $fillable = [
        'OrderID', 'ProductID', 'Quantity', 'Price'
    ];

    // العلاقة مع الطلب (Order)
    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID');
    }

    // العلاقة مع المنتج (Product)
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }
}
