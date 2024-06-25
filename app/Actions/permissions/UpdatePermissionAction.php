<?php

namespace App\Actions\permissions;

use App\DTO\permissions\UpdatePermissionDTO;
use App\Models\Permission;

class UpdatePermissionAction
{
    public function __construct(
        protected Permission $permission
    )
    {
    }

    public function handle(UpdatePermissionDTO $updatePermissionDTO): bool
    {
        $id = $updatePermissionDTO->getId();
        $name = $updatePermissionDTO->getName();
        $updatedAt = $updatePermissionDTO->getUpdatedAt();
        $code = str_replace(" ", "", $name);
        $data = [
            'permission_name' => $name,
            'permission_code' => $code,
            'updated_at' => $updatedAt
        ];
        $status = $this->permission->updatePermission($id,$data);
        return $status;
    }
}
