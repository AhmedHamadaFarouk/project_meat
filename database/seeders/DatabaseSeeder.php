<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ExaminationReceiptSeeder::class);
        $this->call(WasteLogSeeder::class);
        $this->call(ExchangeRawMaterialsSeeder::class);
        $this->call(MaterialInspectionSeeder::class);
        $this->call(DisinfectionMaterialSeeder::class);
        $this->call(CleaningDisinfectionSeeder::class);
        $this->call(dispensePackingSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(BankSeeder::class);
    }
}
