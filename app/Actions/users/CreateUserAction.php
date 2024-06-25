<?php

namespace App\Actions\users;

use App\DTO\users\CreateUserDTO;
use App\Enums\TaskSoftDelete;
use App\Models\Permission;
use App\Models\User;

class CreateUserAction
{
    public function handle(CreateUserDTO $createUserDTO): bool
    {
        $email = $createUserDTO->getEmail();
        $name = $createUserDTO->getName();
        $password = $createUserDTO->getPassword();
        $role = $createUserDTO->getRole();
        $permission = $createUserDTO->getPermission();

//        dd($permission);
        $dataCreateUser = [
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'is_deleted' => TaskSoftDelete::NotDeleted
        ];

        $user = User::create($dataCreateUser);
        if($user){
            $user->roles()->attach($role);
            if(!empty($permission)){
                $existingPermissionIds = Permission::whereIn('permission_id', $permission)->pluck('permission_id')->toArray();
                $nonExistingPermissionIds = array_diff($permission, $existingPermissionIds);
                if (empty($nonExistingPermissionIds)) {
                    $user->permissions()->sync($permission);
                }
                return true;
            }
            return true;
        }else{
            return false;
        }

    }
}
