<?php

namespace Database\Seeders;

use  App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        Company::truncate();
        Schema::enableForeignKeyConstraints();
        Company::factory()->times(100)->create();
    }
}
