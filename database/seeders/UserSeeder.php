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
            "name"=>'admin',
            "email"=>'admin@admin.com',
            "password"=>Hash::make("admin123"),
            "image"=>"test",
            "birth_date"=>"19-7-1999",
            "phone_number"=>"0781063614",
            "referred_by"=>"Null",
            "role_id"=>1,
            "created_at"=>now(),
        ]);
    }
}
