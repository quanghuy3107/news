<?php

namespace App\Features\permissions;

use App\Actions\permissions\CreatePermissionAction;
use App\DTO\permissions\CreatePermissionDTO;

class CreatePermissionFeature
{
    public function __construct(
        protected CreatePermissionAction $createPermissionAction
    )
    {
    }

    private CreatePermissionDTO $createPermissionDTO;

    public function setPermissionFeature(CreatePermissionDTO $createPermissionDTO) : void
    {
        $this->createPermissionDTO = $createPermissionDTO;
    }

    public function getPermissionFeature(): CreatePermissionDTO
    {
        return $this->createPermissionDTO;
    }

    public function handle(): bool
    {
        return $this->createPermissionAction->handle($this->getPermissionFeature());
    }
}
