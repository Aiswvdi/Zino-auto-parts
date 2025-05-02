<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIssueItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_issue_order_id',
        'part_number',
        'column_number',
        'shelf_number',
        'part_type',
        'part_category',
        'issued_quantity',
    ];

    public function order()
    {
        return $this->belongsTo(StockIssueOrder::class, 'stock_issue_order_id');
    }
}
