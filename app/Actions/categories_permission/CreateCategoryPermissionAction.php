<?php

namespace App\Actions\categories_permission;

use App\DTO\categories_permission\CreateCategoryPermissionDTO;
use App\Models\CategoryPermission;

class CreateCategoryPermissionAction
{
    public function __construct(
        protected CategoryPermission $categoryPermission
    )
    {
    }

    public function handle(CreateCategoryPermissionDTO $createCategoryPermissionDTO) : bool
    {
        $code = $createCategoryPermissionDTO->getCode();
        $createdAt = $createCategoryPermissionDTO->getCreatedAt();
        $data = [
            'code' => $code,
            'created_at' => $createdAt
        ];
        return $this->categoryPermission->insertCategoryPermission($data);
    }
}
