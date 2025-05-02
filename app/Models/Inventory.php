<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory'; 

    public $timestamps = true;
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';

    protected $fillable = [
        'ProductID',
        'Quantity',
        'Location',
        'CostPrice',
        'SellingPrice',
        'Status',
        'CreatedAt',
        'UpdatedAt',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }
}
