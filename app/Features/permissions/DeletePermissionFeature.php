<?php

namespace App\Features\permissions;

use App\Actions\permissions\DeletePermissionAction;
use App\DTO\permissions\DeletePermissionDTO;

class DeletePermissionFeature
{
    public function __construct(
        protected DeletePermissionAction $deletePermissionAction
    )
    {
    }

    private DeletePermissionDTO $deletePermissionDTO;

    public function setDeletePermissionFeature(DeletePermissionDTO $deletePermissionDTO): void
    {
        $this->deletePermissionDTO = $deletePermissionDTO;
    }

    public function getDeletePermissionFeature(): DeletePermissionDTO
    {
        return $this->deletePermissionDTO;
    }

    public function handle(): bool
    {
        return $this->deletePermissionAction->handle($this->getDeletePermissionFeature());
    }
}
