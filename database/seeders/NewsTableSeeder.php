<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = new News();
        $news->user_id = 1;
        $news->category_id = 1;
        $news->subcategory_id = null;
        $news->tag_id = null;
        $news->title = 'Welcome Admin';
        $news->titleEn = 'Start publishing News';
        $news->description = 'Start publishing News';
        $news->descriptionEn = 'Start publishing News';
        $news->image = null;
        $news->save();
    }
}
