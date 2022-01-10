<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();


        $admin = new User();
        $admin->name = "admin";
        $admin->email = "admin@admin.net";
        $admin->phone = 0111111111;
        $admin->password = \Hash::make(123456789);
        $admin->save();


        $accounts = new User();
        $accounts->name = "accounts";
        $accounts->email = "accounts@accounts.net";
        $accounts->phone = 022222222222;
        $accounts->password = \Hash::make(123456789);
        $accounts->save();

        $stores = new User();
        $stores->name = "stores";
        $stores->email = "stores@stores.net";
        $stores->phone = 03333333333;
        $stores->password = \Hash::make(123456789);
        $stores->save();


        $sales = new User();
        $sales->name = "sales";
        $sales->email = "sales@sales.net";
        $sales->phone = 044444444444444;
        $sales->password = \Hash::make(123456789);
        $sales->save();


    }
}
