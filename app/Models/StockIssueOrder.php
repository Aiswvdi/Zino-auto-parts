<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIssueOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_number',
        'issue_date',
        'issued_by',
        'approved_by',
        'notes',
    ];

    public function items()
    {
        return $this->hasMany(StockIssueItem::class);
    }
}
