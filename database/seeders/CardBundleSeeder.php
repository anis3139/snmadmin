<?php

namespace Database\Seeders;

use App\Models\CardBundle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CardBundleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CardBundle::truncate();
        Schema::enableForeignKeyConstraints();
        CardBundle::factory()->times(20)->create();
    }
}
