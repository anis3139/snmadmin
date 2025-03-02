<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolePermissionSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(CardSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(CardBundleSeeder::class);
        $this->call(BundleCardSeeder::class);
        $this->call(CardPackageSeeder::class);
    }
}
