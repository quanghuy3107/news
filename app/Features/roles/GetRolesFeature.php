<?php

namespace App\Features\roles;

use App\Actions\roles\GetRolesAction;
use App\Transformers\RoleTransformer;

class GetRolesFeature
{
    public function __construct(
        protected GetRolesAction $getRolesAction,
        protected RoleTransformer $roleTransformer
    )
    {
    }

    public function getDataRoleTransformer(): \Illuminate\Support\Collection
    {
        return $this->roleTransformer->getRoleTransformer();
    }

    public function handle(): void
    {
        $data = $this->getRolesAction->handle();
        $this->roleTransformer->setRoleTransformer($data);
    }
}
