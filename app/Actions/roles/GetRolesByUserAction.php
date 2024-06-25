<?php

namespace App\Actions\roles;

use App\DTO\users\GetIdUserDTO;
use App\Models\Role;
use App\Models\User;

class GetRolesByUserAction
{
//    public function __construct(
//        protected Role $role
//    )
//    {
//    }

    public function handle(GetIdUserDTO $getIdUserDTO): \Illuminate\Support\Collection
    {
        $id = $getIdUserDTO->getId();
        $user = User::find($id);
        $role = $user->roles;
        return $role;
    }
}
