<?php

namespace Database\Seeders;

use App\Models\Panel\Bank;
use App\Models\Panel\Container;
use App\Models\Panel\Currency;
use App\Models\Panel\PaymentMethod;
use App\Models\Panel\Spiral;
use App\Models\Panel\SystemControl;
use Illuminate\Database\Seeder;

class BasicDefinitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::query()->insertOrIgnore([
            ['id' => 1, 'name' => 'صادرات', 'code' => '123'],
            ['id' => 2, 'name' => 'ملی', 'code' => '456'],
            ['id' => 3, 'name' => 'ملت', 'code' => '789'],
            ['id' => 4, 'name' => 'سینا', 'code' => '012'],
            ['id' => 5, 'name' => 'کشاورزی', 'code' => '345'],
        ]);

        PaymentMethod::query()->insertOrIgnore([
            ['id' => 1, 'name' => 'TT'],
            ['id' => 2, 'name' => 'Credit'],
            ['id' => 3, 'name' => 'L/C'],
        ]);

        Currency::query()->insertOrIgnore([
            ['id' => 1, 'name' => 'دلار'],
            ['id' => 2, 'name' => 'یورو'],
            ['id' => 3, 'name' => 'ین'],
            ['id' => 4, 'name' => 'یوآن'],
        ]);

        Container::query()->insertOrIgnore([
            ['id' => 1, 'name' => '40" HQ'],
            ['id' => 2, 'name' => '40" GP'],
            ['id' => 3, 'name' => '20" GP'],
        ]);

        Spiral::query()->insertOrIgnore([
            ['id' => 1, 'name' => 'Type B:40 mm'],
        ]);

        SystemControl::query()->insertOrIgnore([
            ['id' => 1, 'name' => 'Keba 1070'],
            ['id' => 2, 'name' => 'Keba 1075'],
            ['id' => 3, 'name' => 'Keba 2580'],
            ['id' => 4, 'name' => 'Keba 2880'],
            ['id' => 5, 'name' => 'Keba 2980']
        ]);


    }
}
