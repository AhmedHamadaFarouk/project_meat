<?php

namespace Database\Seeders;

use App\Models\CleaningDisinfection;
use App\Models\DisinfectionMaterials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CleaningDisinfectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('cleaning_disinfections')->truncate();
        CleaningDisinfection::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
