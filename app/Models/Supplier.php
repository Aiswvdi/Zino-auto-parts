<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'SupplierName',
        'ContactPerson',
        'PhoneNumber',
        'Email',
        'CompanyWebsite',
        'Address',
        'City',
        'Country',
    ];
}
