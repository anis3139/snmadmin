<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Admin::truncate();
        Schema::enableForeignKeyConstraints();

            $admin           = new Admin();
            $admin->name     = "Super Admin";
            $admin->email    = "superadmin@example.com";
            $admin->username = "superadmin";
            $admin->phone = "01105050051";
            $admin->status = 1;
            $admin->password = '12345678';
            $admin->save();

    }
}
