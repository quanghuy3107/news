<?php

namespace App\Features\roles;

use App\Actions\roles\GetRolesAction;
use App\Actions\roles\GetRolesByUserAction;
use App\DTO\users\GetIdUserDTO;
use App\Transformers\RoleTransformer;

class GetRoleByUserFeature
{
    public function __construct(
        protected GetRolesByUserAction $getRolesByUserAction,
        protected RoleTransformer $roleTransformer
    )
    {
    }

    private GetIdUserDTO $getIdUserDTO;

    public function setRoleByUserFeature(GetIdUserDTO $getIdUserDTO) : void
    {
        $this->getIdUserDTO = $getIdUserDTO;
    }

    public function getRoleByUserFeature(): GetIdUserDTO
    {
        return $this->getIdUserDTO;
    }

    public function getDataRoleTransformer(): \Illuminate\Support\Collection
    {
        return $this->roleTransformer->getRoleTransformer();
    }

    public function handle(): void
    {
        $data = $this->getRolesByUserAction->handle($this->getRoleByUserFeature());
        $this->roleTransformer->setRoleTransformer($data);
    }
}
