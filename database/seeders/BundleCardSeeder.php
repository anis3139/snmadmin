<?php

namespace Database\Seeders;

use App\Models\BundleCard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BundleCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        BundleCard::truncate();
        Schema::enableForeignKeyConstraints();
        BundleCard::factory()->times(20)->create();
    }
}
