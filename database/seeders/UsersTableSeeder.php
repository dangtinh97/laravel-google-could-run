<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = DB::table('users')->where('email', '=', 'chiendv92@gmail.com');
        if ($user)
        {
            $user->delete();
        }

        User::create([
            'name' => 'admin',
            'email' =>'admin@gmail.com',
            'avt' =>'favicon.png',
            'password' => Hash::make('admin123123@')
        ]);

    }
}
