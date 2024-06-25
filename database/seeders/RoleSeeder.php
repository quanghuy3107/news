<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'Người dùng',
                'role_code' => 'USER',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'role_name' => 'Quản trị',
                'role_code' => 'ADMIN',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'role_name' => 'Chủ tịch',
                'role_code' => 'SUPPERADMIN',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);


    }
}
