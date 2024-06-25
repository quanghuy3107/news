<?php

namespace App\Actions\permissions;

use App\DTO\permissions\FindPermissionDTO;
use App\Models\Permission;

class FindPermissionAction
{
    public function handle(FindPermissionDTO $findPermissionDTO)
    {
        $id = $findPermissionDTO->getId();
        return Permission::find($id);
    }
}
