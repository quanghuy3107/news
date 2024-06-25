<?php

namespace App\Actions\permissions;

use App\DTO\permissions\CreatePermissionDTO;
use App\Models\Permission;

class CreatePermissionAction
{
    public function __construct(
        protected Permission $permission
    )
    {
    }

    public function handle(CreatePermissionDTO $createPermissionDTO): bool
    {
        $name = $createPermissionDTO->getName();
        $desc = $createPermissionDTO->getDesc();
        $createdAt = $createPermissionDTO->getCreatedAt();
        $code = str_replace(" ", "", $name);
        $data = [
            'permission_name' => $name,
            'permission_code' => $code,
            'permission_desc' => $desc,
            'created_at' => $createdAt
        ];
        $status = $this->permission->insertPermission($data);
        return $status;
    }
}
