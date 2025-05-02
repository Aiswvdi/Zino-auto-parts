<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; // اسم الجدول
    protected $primaryKey = 'id'; // المفتاح الأساسي
    public $timestamps = true; // تفعيل التحديث التلقائي

    const CREATED_AT = 'CreatedAt'; // تحديد اسم عمود الإنشاء
    const UPDATED_AT = 'UpdatedAt'; // تحديد اسم عمود التحديث

    protected $fillable = [
        'FullName',
        'Email',
        'Phone',
        'Address'
    ];
}


