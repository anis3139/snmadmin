<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new Blog();
        $blog->admin_id = 1;
        $blog->category_id = 1;
        $blog->subcategory_id = null;
        $blog->tag_id = null;
        $blog->title = 'Welcome Admin';
        $blog->titleEn = 'Start publishing Blog';
        $blog->description = 'Start publishing Blog';
        $blog->descriptionEn = 'Start publishing Blog';
        $blog->image = null;
        $blog->save();
    }
}
