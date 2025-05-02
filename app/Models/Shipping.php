<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = true;
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';

    protected $fillable = [
        'orderID',
        'trackingNumber',
        'carrier',
        'shippingAddress',
        'shippingDate',
        'CreatedAt',
        'UpdatedAt',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID');
    }

    public function shipmentTracking()
    {
        return $this->hasOne(ShipmentTracking::class, 'ShippingID');
    }
}
