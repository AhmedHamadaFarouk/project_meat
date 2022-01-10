<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        $admins = new Admin();
        $admins->name = "Admin";
        $admins->email = "admin@admin.com";
        $admins->phone = "01111289180";
        $admins->password = \Hash::make(123456789);
        $admins->save();

    }
}
