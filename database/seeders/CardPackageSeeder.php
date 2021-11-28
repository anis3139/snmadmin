<?php

namespace Database\Seeders;

use App\Models\CardPackage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CardPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CardPackage::truncate();
        Schema::enableForeignKeyConstraints();
        CardPackage::factory()->times(20)->create();
    }
}
