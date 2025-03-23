<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert roles into the roles table
        DB::table('roles')->insert([
            ['name' => 'Admin', 'description' => 'Administrator role with full access'],
            ['name' => 'Student', 'description' => 'Student role with limited access'],
        ]);
        DB::table('users')->insert([
            ['name' => 'Master Administrator', 'email' => 'admin@gmail.com', 'role_id' => 1, 'password' =>  Hash::make('administrator.2025')],
        ]);
    }
}
