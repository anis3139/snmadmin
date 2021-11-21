<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->nameEn = "Others";
        $category->nameBn = "অন্যান্য";
        $category->description = "others";
        $category->status = "1";
        $category->save();
    }
}
