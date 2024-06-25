<?php

namespace App\Actions\users;

use App\DTO\users\UpdateUserDTO;
use App\Enums\TaskSoftDelete;
use App\Models\Permission;
use App\Models\User;

class UpdateUserAction
{
    public function handle(UpdateUserDTO $updateUserDTO): bool
    {
        $id = $updateUserDTO->getId();
        $email = $updateUserDTO->getEmail();
        $name = $updateUserDTO->getName();
        $role = $updateUserDTO->getRole();
        $permission = $updateUserDTO->getPermission();

        $dataUpdateUser = [
            'name' => $name,
            'email' => $email,
        ];


        $status = User::where('id',$id)->update($dataUpdateUser);

        $user = User::find($id);
        if($status){
            $user->roles()->sync($role);
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
