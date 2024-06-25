<?php

namespace App\Features\permissions;

use App\Actions\permissions\FindPermissionAction;
use App\DTO\permissions\FindPermissionDTO;

class FindPermissionFeature
{
    public function __construct(
        protected FindPermissionAction $findPermissionAction
    )
    {
    }

    private FindPermissionDTO $findPermissionDTO;

    public function setFindPermissionFeature(FindPermissionDTO $findPermissionDTO) : void
    {
        $this->findPermissionDTO = $findPermissionDTO;
    }

    public function getFindPermissionFeature(): FindPermissionDTO
    {
        return $this->findPermissionDTO;
    }

    public function handle()
    {
        return $this->findPermissionAction->handle($this->getFindPermissionFeature());
    }
}
