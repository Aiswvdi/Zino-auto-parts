<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnginePart extends Model
{
    protected $fillable = [
        'name', 'manufacturer', 'price', 'description', 'image'
    ];
}

