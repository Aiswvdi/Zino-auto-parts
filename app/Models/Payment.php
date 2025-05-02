<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'PaymentDate',
        'PaymentAmount',
        'PaymentMethod',
        'PaymentStatus',
        'OrderID',
        'PayerName',
        'Currency'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID');
    }
}

