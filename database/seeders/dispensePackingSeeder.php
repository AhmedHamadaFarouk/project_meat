<?php

namespace Database\Seeders;

use App\Models\DisinfectionMaterials;
use App\Models\DispensePacking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class dispensePackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('dispense_packings')->truncate();
        DispensePacking::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
