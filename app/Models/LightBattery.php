<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightBattery extends Model
{
    use HasFactory;

    
    protected $table = 'lights_batteries';

    protected $fillable = ['name', 'type', 'description', 'price', 'image'];
}


