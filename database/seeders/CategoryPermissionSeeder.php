<?php

namespace Database\Seeders;

use App\Models\CategoryPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories_permission')->insert([

            [
                'code' => 'Posts',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'code' => 'Users',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'code' => 'Category Permission',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'code' => 'Permissions',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
