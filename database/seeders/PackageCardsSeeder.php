<?php

namespace Database\Seeders;

use App\Models\PackageCards;
use Illuminate\Database\Seeder;

class PackageCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PackageCards::factory()->times(20)->create();
    }
}
