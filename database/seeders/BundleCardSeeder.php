<?php

namespace Database\Seeders;

use App\Models\BundleCard;
use Illuminate\Database\Seeder;

class BundleCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BundleCard::factory()->times(20)->create();
    }
}
