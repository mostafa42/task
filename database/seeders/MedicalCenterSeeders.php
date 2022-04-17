<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalCenter;
use Illuminate\Support\Str;

class MedicalCenterSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicalCenter::factory()->count(10)->create();

    }
}
