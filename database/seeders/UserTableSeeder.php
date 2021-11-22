<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // System Admin
        $admin = new User();
        $admin->name = 'Admin';
        $admin->username = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->phone = '01740144461';
        $admin->password = bcrypt('password');



        // System Author
        $author = new User();
        $author->name = 'Author';
        $author->username = 'Author';
        $author->email = 'author@gmail.com';
        $author->phone = '01740144462';
        $author->password = bcrypt('password');



        // Editor
        $editor = new User();
        $editor->name = 'Editor';
        $editor->username = 'Editor';
        $editor->email = 'editor@gmail.com';
        $editor->phone = '01740144463';
        $editor->password = bcrypt('password');



        // viewer
        $_viewer = new User();
        $_viewer->name = 'Viewer';
        $_viewer->username = 'Viewer';
        $_viewer->email = 'viewer@gmail.com';
        $_viewer->phone = '01740144464';
        $_viewer->password = bcrypt('password');

       

    }
}
