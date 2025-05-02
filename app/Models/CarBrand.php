<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;

    // تحديد الجدول المرتبط بالنموذج إذا كان الاسم غير قياسي
    // protected $table = 'car_brands';  // إذا كان اسم الجدول مختلفًا عن اسم الموديل (اختياري)

    // تحديد الأعمدة القابلة للتعديل
    protected $fillable = ['name'];
}
