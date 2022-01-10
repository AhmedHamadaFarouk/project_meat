<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('suppliers')->truncate();
        Supplier::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}
