<?php

namespace Database\Seeders;

use App\Models\CardBundle;
use Illuminate\Database\Seeder;

class CardBundleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardBundle::factory()->times(20)->create();
    }
}
