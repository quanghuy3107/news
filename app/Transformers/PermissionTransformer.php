<?php

namespace App\Transformers;

use App\DTO\PermissionDTO;
use Illuminate\Support\Collection;

class PermissionTransformer
{
    private Collection $permission;

    public function setDataPermission(Collection $permission) : void
    {
        $this->permission = $permission;
    }

    public function getDataTransformer(): Collection
    {
        return $this->permission;
    }
}
