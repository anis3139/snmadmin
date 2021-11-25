<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Schema::disableForeignKeyConstraints();
        Admin::truncate();
        Role::truncate();
        Permission::truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();



        $user = new Admin;
        $user->name = 'anis';
        $user->username = 'admin';
        $user->email = 'admin@gmail.com';
        $user->phone = '01816366535';
        $user->password ='password';
        $user->status = 1;
        $user->save();


        // Create Roles
        $roleSuperAdmin = Role::create(['guard_name' => 'admin', 'name' => 'superadmin']);
        $roleAdmin = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $roleEditor = Role::create(['guard_name' => 'admin', 'name' => 'editor']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'home',
                'permissions' => [
                    'home.view',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    // Blog Permissions
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],

            [
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],


            [
                'group_name' => 'category',
                'permissions' => [

                    'category.create',
                    'category.view',
                    'category.edit',
                    'category.delete',
                    'category.approve',
                ]
            ],

            [
                'group_name' => 'tag',
                'permissions' => [

                    'tag.create',
                    'tag.view',
                    'tag.edit',
                    'tag.delete',
                    'tag.approve',
                ]
            ],


            [
                'group_name' => 'about',
                'permissions' => [

                    'about.create',
                    'about.view',
                    'about.edit',
                    'about.delete',
                    'about.approve',
                ]
            ],
            [
                'group_name' => 'contact',
                'permissions' => [

                    'contact.create',
                    'contact.view',
                    'contact.edit',
                    'contact.delete',
                    'contact.approve',
                ]
            ],
            [
                'group_name' => 'slider',
                'permissions' => [

                    'slider.create',
                    'slider.view',
                    'slider.edit',
                    'slider.delete',
                    'slider.approve',
                ]
            ],
            [
                'group_name' => 'setting',
                'permissions' => [

                    'setting.create',
                    'setting.view',
                    'setting.edit',
                    'setting.delete',
                    'setting.approve',
                ]
            ],
            [
                'group_name' => 'pages',
                'permissions' => [

                    'pages.create',
                    'pages.view',
                    'pages.edit',
                    'pages.delete',
                    'pages.approve',
                ]
            ],

            [
                'group_name' => 'social',
                'permissions' => [

                    'social.create',
                    'social.view',
                    'social.edit',
                    'social.delete',
                    'social.approve',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [

                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete',
                    'user.approve',
                ]
            ],
            [
                'group_name' => 'visitor',
                'permissions' => [

                    'visitor.create',
                    'visitor.view',
                    'visitor.edit',
                    'visitor.delete',
                    'visitor.approve',
                ]
            ],
        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['guard_name' => 'admin', 'name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->hasPermissionTo($permission, 'admin');
                $permission->assignRole($roleSuperAdmin);
            }
        }

        // Editor Permission

        $editorPermissions = [


            'home.view',

            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.approve',

            'category.create',
            'category.view',
            'category.edit',
            'category.approve',


            'about.create',
            'about.view',
            'about.edit',
            'about.approve',

            'contact.create',
            'contact.view',
            'contact.edit',
            'contact.approve',

            'slider.create',
            'slider.view',
            'slider.edit',
            'slider.delete',
            'slider.approve',

            'setting.create',
            'setting.view',
            'setting.edit',
            'setting.approve',
            'pages.create',
            'pages.view',
            'pages.edit',
            'pages.approve',



        ];

        $roleEditor->syncPermissions($editorPermissions);



        //Admin Permission

        $adminPermissions = [

            'home.view',

            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',


            'admin.view',





            'category.create',
            'category.view',
            'category.edit',
            'category.delete',
            'category.approve',


            'about.create',
            'about.view',
            'about.edit',
            'about.delete',
            'about.approve',

            'contact.create',
            'contact.view',
            'contact.edit',
            'contact.delete',
            'contact.approve',

            'slider.create',
            'slider.view',
            'slider.edit',
            'slider.delete',
            'slider.approve',

            'setting.create',
            'setting.view',
            'setting.edit',
            'setting.delete',
            'setting.approve',

            'pages.create',
            'pages.view',
            'pages.edit',
            'pages.delete',
            'pages.approve',


            'social.create',
            'social.view',
            'social.edit',
            'social.delete',
            'social.approve',

            'user.create',
            'user.view',
            'user.edit',
            'user.delete',
            'user.approve',

            'visitor.create',
            'visitor.view',
            'visitor.edit',
            'visitor.delete',
            'visitor.approve',

        ];

        $roleAdmin->syncPermissions($adminPermissions);

        //Model Has Roles Create

        DB::table('model_has_roles')->insert([
            'role_id' => $roleSuperAdmin->id,
            'model_type' => 'App\Models\Admin',
            'model_id' => $user->id
        ]);
    }
}
