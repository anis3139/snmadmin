<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();
        $category = new Category();
        $category->nameEn = "Others";
        $category->nameBn = "অন্যান্য";
        $category->description = "others";
        $category->status = "1";
        $category->save();
    }
}
