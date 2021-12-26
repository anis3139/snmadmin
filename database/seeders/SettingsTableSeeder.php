<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        Setting::truncate();
        Schema::enableForeignKeyConstraints();
        $setting = new Setting();
        $setting->site_name = "Website Name";
        $setting->site_title = "Website Title";
        $setting->logo = "default_image/logo.png";
        $setting->default_image = "default_image/default.jpeg";
        $setting->copyright_message = "© 2020 All rights reserved";
        $setting->copyright_name = "PIXINVENT";
        $setting->copyright_url = "https://facebook.com/anis3139";
        $setting->design_develop_by_text = "Design and Developed by";
        $setting->design_develop_by_name = "PIXINVENT";
        $setting->design_develop_by_url = "https://facebook.com/anis3139";
        $setting->save();
    }
}
