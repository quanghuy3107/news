<?php

namespace App\Actions\permissions;

use App\DTO\permissions\DeletePermissionDTO;
use App\Models\Permission;

class DeletePermissionAction
{
    public function __construct(
        protected Permission $permission
    )
    {
    }

    public function handle(DeletePermissionDTO $deletePermissionDTO): bool
    {
        $id = $deletePermissionDTO->getId();
        $status = $this->permission->deletePermission($id);
        return $status;
    }
}
