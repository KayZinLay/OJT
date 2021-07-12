<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('posts')->insert([
            'title' => 'Title1',
            'description' => 'titletitle',
            'status' => '1',
            'create_user_id' => '1',
            'updated_user_id' => '1',
            'deleted_user_id' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'deleted_at' => NOW(),

        ]);
    }
}
