<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'CategoryName',
        'Status',
    ];

    public $timestamps = false; // لأننا نستخدم CreatedAt و UpdatedAt يدويًا
}
