<?php

namespace App\Features\permissions;

use App\Actions\permissions\UpdatePermissionAction;
use App\DTO\permissions\UpdatePermissionDTO;

class UpdatePermissionFeature
{
    public function __construct(
        protected UpdatePermissionAction $updatePermissionAction
    )
    {
    }

    private UpdatePermissionDTO $updatePermissionDTO;

    public function setUpdatePermissionFeature(UpdatePermissionDTO $updatePermissionDTO): void
    {
        $this->updatePermissionDTO = $updatePermissionDTO;
    }

    public function getUpdatePermissionFeature(): UpdatePermissionDTO
    {
        return $this->updatePermissionDTO;
    }

    public function handle(): bool
    {
        return $this->updatePermissionAction->handle($this->getUpdatePermissionFeature());
    }
}
