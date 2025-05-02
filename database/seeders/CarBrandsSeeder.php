<?php

use Illuminate\Database\Seeder;
use App\Models\CarBrand;

class CarBrandsSeeder extends Seeder
{
    public function run()
    {
        CarBrand::create(['name' => 'تويوتا']);
        CarBrand::create(['name' => 'نيسان']);
        CarBrand::create(['name' => 'فورد']);
        CarBrand::create(['name' => 'مرسيدس']);
        CarBrand::create(['name' => 'بي إم دبليو']);
    }
}

