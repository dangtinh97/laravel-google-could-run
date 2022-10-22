<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->truncate();

        $permissions = DB::table('permissions')->get();

        if ($permissions) {
            foreach ($permissions as $permission) {
                DB::table('permissions')->delete($permission->id);
            }
        }

        $arrayPermission = [
            [
                'name' => 'Permission View',
                'code' => 'permission_index'
            ],
            [
                'name' => 'Permission Create',
                'code' => 'permission_create'
            ],
            [
                'name' => 'Permission Edit',
                'code' => 'permission_edit'
            ],
            [
                'name' => 'Permission Delete',
                'code' => 'permission_delete'
            ],
            [
                'name' => 'Role View',
                'code' => 'role_index'
            ],
            [
                'name' => 'Role Create',
                'code' => 'role_create'
            ],
            [
                'name' => 'Role Edit',
                'code' => 'role_edit'
            ],
            [
                'name' => 'Role Delete',
                'code' => 'role_delete'
            ],
            [
                'name' => 'User View',
                'code' => 'user_index'
            ],
            [
                'name' => 'User Create',
                'code' => 'user_create'
            ],
            [
                'name' => 'User Edit',
                'code' => 'user_edit'
            ],
            [
                'name' => 'User Delete',
                'code' => 'user_delete'
            ],
            [
                'name' => 'Category',
                'code' => 'category_index'
            ],
            [
                'name' => 'Category Create',
                'code' => 'category_create'
            ],
            [
                'name' => 'Category Edit',
                'code' => 'category_edit'
            ],
            [
                'name' => 'Category delete',
                'code' => 'category_delete'
            ],
            [
                'name' => 'Banner Index',
                'code' => 'banner_index'
            ],
            [
                'name' => 'Banner Create',
                'code' => 'banner_create'
            ],
            [
                'name' => 'Banner Edit',
                'code' => 'banner_edit'
            ],
            [
                'name' => 'Banner Delete',
                'code' => 'banner_delete'
            ],
        ];

        foreach ($arrayPermission as $permission) {
            $data = [
                'name' => $permission['name'],
                'code' => $permission['code']
            ];

            \App\Models\Permission::create($data);
        }

    }
}
