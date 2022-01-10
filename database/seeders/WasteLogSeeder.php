<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\WasteLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class WasteLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('waste_logs')->truncate();
        WasteLog::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();

    }
}
