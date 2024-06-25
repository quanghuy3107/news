<?php

namespace Database\Seeders;

use App\Models\CategoryPermission;
use App\Models\Permission;
use App\Models\RoleUserModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryPermissionIdUser = CategoryPermission::where('code','Users')->first()->category_permission_id;
        $categoryPermissionIdPosts = CategoryPermission::where('code','Posts')->first()->category_permission_id;
        $permissionId = CategoryPermission::where('code','Permissions')->first()->category_permission_id;
        $categoryPermissionId = CategoryPermission::where('code','Category Permission')->first()->category_permission_id;


        $userIdAdmin = User::join('details_role_user', 'users.id', '=', 'details_role_user.user_id')
            ->join('roles', 'roles.role_id', '=', 'details_role_user.role_id')
            ->where('roles.role_code','ADMIN')
            ->get();

        $permissionShowPosts = Permission::create([
            'permission_name' => 'Show Posts',
            'permission_code' => 'ShowPosts',
            'permission_desc' => $categoryPermissionIdPosts,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Permission::create([
            'permission_name' => 'Update Posts',
            'permission_code' => 'UpdatePosts',
            'permission_desc' => $categoryPermissionIdPosts,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $permissionCreatePosts = Permission::create([
            'permission_name' => 'Create Posts',
            'permission_code' => 'CreatePosts',
            'permission_desc' => $categoryPermissionIdPosts,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Permission::create([
            'permission_name' => 'Delete Posts',
            'permission_code' => 'DeletePosts',
            'permission_desc' => $categoryPermissionIdPosts,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $permissionShowUser = Permission::create([
            'permission_name' => 'Show Users',
            'permission_code' => 'ShowUsers',
            'permission_desc' => $categoryPermissionIdUser,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Permission::create([
            'permission_name' => 'Delete Users',
            'permission_code' => 'DeleteUsers',
            'permission_desc' => $categoryPermissionIdUser,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Permission::create([
            'permission_name' => 'Create Users',
            'permission_code' => 'CreateUsers',
            'permission_desc' => $categoryPermissionIdUser,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Permission::create([
            'permission_name' => 'Update Users',
            'permission_code' => 'UpdateUsers',
            'permission_desc' => $categoryPermissionIdUser,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Permission::create([
            'permission_name' => 'Change Status',
            'permission_code' => 'ChangeStatus',
            'permission_desc' => $categoryPermissionIdUser,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Permission::create([
            'permission_name' => 'Show Permission',
            'permission_code' => 'ShowPermission',
            'permission_desc' => $permissionId,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Permission::create([
            'permission_name' => 'Delete Permission',
            'permission_code' => 'DeletePermission',
            'permission_desc' => $permissionId,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Permission::create([
            'permission_name' => 'Create Permission',
            'permission_code' => 'CreatePermission',
            'permission_desc' => $permissionId,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Permission::create([
            'permission_name' => 'Update Permission',
            'permission_code' => 'UpdatePermission',
            'permission_desc' => $permissionId,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Permission::create([
            'permission_name' => 'Create Category Permission',
            'permission_code' => 'CreateCategoryPermission',
            'permission_desc' => $categoryPermissionId,
            'created_at' => date('Y-m-d H:i:s')
        ]);


        $permissionShowPosts->users()->attach($userIdAdmin);
        $permissionCreatePosts->users()->attach($userIdAdmin);
        $permissionShowUser->users()->attach($userIdAdmin);

    }
}
