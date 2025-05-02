<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    protected $primaryKey = 'PaymentID';
    public $timestamps = true;

    protected $fillable = [
        'SupplierID',
        'InvoiceID',
        'AmountPaid',
        'PaymentMethod',
        'TransactionReference',
        'PaymentDate',
        'Status',
        'Notes',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'SupplierID');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'InvoiceID');
    }
}
