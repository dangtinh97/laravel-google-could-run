<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->where('name', 'Admin')->delete();

        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);

        $role = DB::table('roles')->where('name', '=', 'Admin')->first();

        $users = DB::table('users')->where('email', '=', 'admin@gmail.com')->first();

        $roleUser = [
            'user_id' => $users->id,
            'role_id' => $role->id
        ];
        DB::table('role_user')->insert($roleUser);

    }
}
