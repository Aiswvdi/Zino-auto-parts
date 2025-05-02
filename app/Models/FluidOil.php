<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FluidOil extends Model
{
    use HasFactory;
    protected $table = 'fluid_oils';

    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'image',
    ];
}
