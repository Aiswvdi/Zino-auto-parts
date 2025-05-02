<?php

use Illuminate\Database\Seeder;
use App\Models\CarCategory;

class CarCategoriesSeeder extends Seeder
{
    public function run()
    {
        CarCategory::create(['name' => 'سيدان']);
        CarCategory::create(['name' => 'SUV']);
        CarCategory::create(['name' => 'كوبيه']);
        CarCategory::create(['name' => 'ميني فان']);
        CarCategory::create(['name' => 'بيك أب']);
    }
}

