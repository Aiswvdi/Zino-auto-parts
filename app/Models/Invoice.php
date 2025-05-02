<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'InvoiceNumber',
        'InvoiceType',
        'CustomerID',
        'InvoiceDate',
        'DueDate',
        'PaymentStatus',
        'NetAmount',
        'TaxAmount',
        'DiscountAmount',
        'TotalAmount',
        'Currency',
    ];

    public $timestamps = false; // لأن CreatedAt و UpdatedAt يتم تحديثهما يدويًا

    // العلاقة مع العملاء
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID');
    }
}

