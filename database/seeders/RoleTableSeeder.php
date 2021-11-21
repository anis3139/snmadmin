<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin        = Permission::all();
        $author      = Permission::whereNotIn('name',['manage_admin'])->get();
        $editor    = Permission::whereNotIn('name',['manage_author','manage_admin'])->get();
        $viewer    = Permission::whereIn('name',['manage_viewer'])->get();

        // Admin
        $_admin = new Role();
        $_admin->name = "Admin";
        $_admin->save();
        $_admin->syncPermissions($admin);
        // Author
        $_author = new Role();
        $_author->name = "Author";
        $_author->save();
        $_author->syncPermissions($author);

        // Editor
        $_editor = new Role();
        $_editor->name = "Editor";
        $_editor->save();
        $_editor->syncPermissions($editor);

        // Viewer
        $_viewer = new Role();
        $_viewer->name = "Viewer";
        $_viewer->save();
        $_viewer->syncPermissions($viewer);


    }
}
