<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;

    protected $table = 'returns'; // اسم الجدول

    public $timestamps = false; // لأنك استخدمت CreatedAt و UpdatedAt بدلاً من created_at و updated_at

    protected $fillable = [
        'OrderID', 'returnReason', 'returnDate', 'refundAmount'
    ];

    // العلاقة مع الطلب (Order)
    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID');
    }
}
