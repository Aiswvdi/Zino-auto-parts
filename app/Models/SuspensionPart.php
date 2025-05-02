<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuspensionPart extends Model
{
    use HasFactory;

    // تحديد الجداول التي سيتم استخدامها في هذا الموديل (في حالة اسم الجدول غير الافتراضي)
    protected $table = 'suspension_parts';

    // تحديد الأعمدة التي يمكن تعبئتها تلقائيًا (Mass Assignment)
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    // لتحديد العلاقة إذا كان هناك علاقة بين الجداول، مثل علاقة مع جدول المنتجات أو التصنيفات
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
