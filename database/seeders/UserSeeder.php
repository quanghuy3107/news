<?php

namespace Database\Seeders;

use App\Models\RoleUserModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleClient = RoleUserModel::where('role_code','USER')->first()->role_id;
        $roleAdmin = RoleUserModel::where('role_code','ADMIN')->first()->role_id;
        $roleSupperAdmin = RoleUserModel::where('role_code','SUPPERADMIN')->first()->role_id;
        $client = User::create(
                [
                    'name' => 'Khach hang1',
                    'email' => 'huythqph38040@fpt.edu.vn',
                    'password' => Hash::make('31072004'),
                    'created_at' => date('Y-m-d H:i:s')
                ]
        );
        $client->roles()->attach($roleClient);
        $admin = User::create(
            [
                'name' => 'Quản trị',
                'email' => 'huyp3172004@gmail.com',
                'password' => Hash::make('31072004'),
                'created_at' => date('Y-m-d H:i:s')
            ],

        );
        $admin->roles()->attach($roleAdmin);
        $supperAdmin =User::create(
            [
                'name' => 'Chủ tịch',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('31072004'),
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
        $supperAdmin->roles()->attach($roleSupperAdmin);

    }
}
