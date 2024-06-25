<?php

namespace App\Features\categories_permission;

use App\Actions\categories_permission\CreateCategoryPermissionAction;
use App\DTO\categories_permission\CreateCategoryPermissionDTO;

class CreateCategoryPermissionFeature
{
    public function __construct(
        protected CreateCategoryPermissionAction $createCategoryPermissionAction
    )
    {
    }

    private CreateCategoryPermissionDTO $createCategoryPermissionDTO;

    public function setCreateCategoryPermissionFeature(CreateCategoryPermissionDTO $createCategoryPermissionDTO) : void
    {
        $this->createCategoryPermissionDTO = $createCategoryPermissionDTO;
    }

    public function getCreateCategoryPermissionFeature(): CreateCategoryPermissionDTO
    {
        return $this->createCategoryPermissionDTO;
    }

    public function handle(): bool
    {
        return $this->createCategoryPermissionAction->handle($this->getCreateCategoryPermissionFeature());
    }
}
