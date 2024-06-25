<?php

namespace App\Transformers;

use Illuminate\Support\Collection;

class RoleTransformer
{
    private Collection $dataRole;
    public function setRoleTransformer(Collection $dataRole): void
    {
        $this->dataRole = $dataRole;
    }

    public function getRoleTransformer(): Collection
    {
        return $this->dataRole;
    }
}
