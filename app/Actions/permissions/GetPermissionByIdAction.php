<?php

namespace App\Actions\permissions;

use App\DTO\users\GetIdUserDTO;
use App\Models\User;

class GetPermissionByIdAction
{
    public function handle(GetIdUserDTO $getIdUserDTO): \Illuminate\Support\Collection
    {
        $id = $getIdUserDTO->getId();
        $user = User::find($id);
        $permissions = $user->permissions;
        return $permissions;
    }
}
