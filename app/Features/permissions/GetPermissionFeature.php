<?php

namespace App\Features\permissions;

use App\Actions\permissions\GetPermissionsAction;
use App\DTO\PermissionDTO;
use App\services\GetPermissionService;
use App\Transformers\PermissionTransformer;
use Illuminate\Support\Collection;

class GetPermissionFeature
{
    public function __construct(
        protected GetPermissionsAction $getPermissionsAction,
        protected PermissionTransformer $permissionTransformer,
        protected GetPermissionService $getPermissionService
    )
    {
    }

    public function getTransform(): Collection
    {
        return $this->permissionTransformer->getDataTransformer();
    }

    public function handle(): void
    {
        $dataPermission = $this->getPermissionsAction->handle();
        $this->getPermissionService->setDataPermissionService($dataPermission);
        $data = $this->getPermissionService->handle();
        $this->permissionTransformer->setDataPermission($data);
    }
}
