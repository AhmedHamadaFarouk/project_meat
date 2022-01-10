<?php

namespace Database\Seeders;

use App\Models\DisinfectionMaterials;
use App\Models\ExchangeRawMaterials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DisinfectionMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('disinfection_materials')->truncate();
        DisinfectionMaterials::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
