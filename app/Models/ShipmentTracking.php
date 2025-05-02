<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentTracking extends Model
{
    // تحديد اسم الجدول الأساسي
    protected $table = 'shipment_tracking';

    // المفتاح الأساسي
    protected $primaryKey = 'id';

    // استخدام أعمدة مخصصة للتواريخ
    public $timestamps = true;
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'OrderID',
        'ShippingID',
        'Status',
        'CurrentLocation',
        'EstimatedDeliveryDate',
        'ActualDeliveryDate',
    ];

    // علاقة الشحنة بالطلب
    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID');
    }

    // علاقة التتبع بالشحن
    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'ShippingID');
    }
}
