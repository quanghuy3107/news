<?php

namespace App\Features\permissions;

use App\Actions\permissions\GetPermissionByIdAction;
use App\DTO\users\GetIdUserDTO;
use App\Transformers\PermissionTransformer;

class GetPermissionByUserFeature
{
    public function __construct(
        protected GetPermissionByIdAction $getPermissionByIdAction,
        protected PermissionTransformer $permissionTransformer
    )
    {
    }

    private GetIdUserDTO $getIdUserDTO;

    public function setPermissionByUserFeature(GetIdUserDTO $getIdUserDTO) : void
    {
        $this->getIdUserDTO = $getIdUserDTO;
    }

    public function getPermissionByUserFeature(): GetIdUserDTO
    {
        return $this->getIdUserDTO;
    }

    public function getDataPermissionTransformer(): \Illuminate\Support\Collection
    {
        return $this->permissionTransformer->getDataTransformer();
    }

    public function handle(): void
    {
        $data = $this->getPermissionByIdAction->handle($this->getPermissionByUserFeature());
        $this->permissionTransformer->setDataPermission($data);
    }
}
