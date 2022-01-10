<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\ExaminationReceipt;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExaminationReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('examination_receipts')->truncate();
        ExaminationReceipt::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();

    }
}
