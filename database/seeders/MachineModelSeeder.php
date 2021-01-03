<?php

namespace Database\Seeders;

use App\Models\Panel\MachineDrive;
use App\Models\Panel\MachineModel;
use App\Models\Panel\MachineSeries;
use App\Models\Panel\MachineType;
use App\Models\Panel\MachineWeight;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachineModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MachineWeight::query()->insertOrIgnore([
            ['id' => 1, 'description' => 120],
            ['id' => 2, 'description' => 320],
            ['id' => 3, 'description' => 1200],
            ['id' => 4, 'description' => 260],
            ['id' => 5, 'description' => 400],
        ]);

        MachineDrive::query()->insertOrIgnore([
            ['id' => 1, 'description' => 'BS'],
            ['id' => 2, 'description' => 'BT'],
            ['id' => 3, 'description' => 'BU'],
            ['id' => 4, 'description' => 'BI'],
        ]);

        MachineSeries::query()->insertOrIgnore([
            ['id' => 1, 'code' => 'std', 'description' => 'استاندارد'],
            ['id' => 2, 'code' => 'eco', 'description' => 'اکونومی'],
        ]);

        MachineType::query()->insertOrIgnore([
            ['id' => 1, 'description' => 'دستگاه تزریق'],
            ['id' => 2, 'description' => 'دستگاه آسیاب'],
        ]);

        MachineModel::query()->insertOrIgnore([
            ['id' => 1, 'machine_series_id' => 1, 'machine_weight_id' => 1, 'machine_drive_id' => 1, 'machine_type_id' => 1],
            ['id' => 2, 'machine_series_id' => 1, 'machine_weight_id' => 2, 'machine_drive_id' => 2, 'machine_type_id' => 1],
            ['id' => 3, 'machine_series_id' => 1, 'machine_weight_id' => 3, 'machine_drive_id' => 3, 'machine_type_id' => 1],
            ['id' => 4, 'machine_series_id' => 1, 'machine_weight_id' => 4, 'machine_drive_id' => 4, 'machine_type_id' => 1],
            ['id' => 5, 'machine_series_id' => 1, 'machine_weight_id' => 5, 'machine_drive_id' => 1, 'machine_type_id' => 1],
            ['id' => 6, 'machine_series_id' => 1, 'machine_weight_id' => 1, 'machine_drive_id' => 2, 'machine_type_id' => 1],
            ['id' => 7, 'machine_series_id' => 1, 'machine_weight_id' => 2, 'machine_drive_id' => 3, 'machine_type_id' => 1],
            ['id' => 8, 'machine_series_id' => 1, 'machine_weight_id' => 3, 'machine_drive_id' => 4, 'machine_type_id' => 1],
        ]);
    }
}
