<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
        'UserID', 'TotalAmount', 'PaymentStatus', 'OrderStatus', 'ShippingAddress', 'OrderDate'
    ];

    protected $casts = [
        'OrderDate' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}

