<?php

namespace Database\Seeders;

use App\Models\ExchangeRawMaterials;
use App\Models\MaterialInspection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MaterialInspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('material_inspections')->truncate();
        MaterialInspection::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
