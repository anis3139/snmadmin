<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting();
        $setting->site_name = "Website Name";
        $setting->site_title = "Website Title";
        $setting->logo = "default_image/logo.png";
        $setting->default_image = "default_image/default.jpeg";
        $setting->copyright_message = "© 2020 All rights reserved";
        $setting->copyright_name = "PIXINVENT";
        $setting->copyright_url = "https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent";
        $setting->design_develop_by_text = "Design and Developed by";
        $setting->design_develop_by_name = "PIXINVENT";
        $setting->design_develop_by_url = "https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent";
        $setting->save();
    }
}
