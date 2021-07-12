<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'profile' => 'AAAA',
            'type' => '0',
            'phone' => '09421000',
            'address' => '',
            'dob' => '1994/01/24',
            'create_user_id' => '1',
            'updated_user_id' => '1',
            'deleted_user_id' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'deleted_at' => NOW(),

        ]);
    }
}
