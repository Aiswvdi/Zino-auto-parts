<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_number',
        'description',
        'car_name',
        'car_model',
        'car_category',
        'product_type',
        'manufacturer',
        'purchase_date',
        'quantity',
        'purchase_price',
        'sale_price',
        'image_path',
    ];

}
