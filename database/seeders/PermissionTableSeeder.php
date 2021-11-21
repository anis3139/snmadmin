<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage_admin',
            'manage_author',
            'manage_editor',
            'manage_viewer',
            'manage_category',
            'manage_subcategory',
            'manage_tag',
            'create',
            'view',
            'edit',
            'delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
