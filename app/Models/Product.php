<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'details',
        'supplierID',
        'car_category',
        'car_brand',
        'car_model',
        'product_brand',
        'is_original',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierID');
    }
}
