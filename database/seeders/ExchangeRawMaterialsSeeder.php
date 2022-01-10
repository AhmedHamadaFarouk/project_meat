<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\ExchangeRawMaterials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExchangeRawMaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('exchange_raw_materials')->truncate();
        ExchangeRawMaterials::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();

    }
}
