<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    use HasFactory;

    // تحديد الأعمدة القابلة للتعديل
    protected $fillable = ['name'];
}
