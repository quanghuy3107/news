<?php

namespace App\services;


use Illuminate\Support\Collection;

class GetPermissionService
{
    private Collection $permission;

    public function setDataPermissionService(Collection $permission) : void
    {
        $this->permission = $permission;
    }

    public function getDataPermissionService(): Collection
    {
        return $this->permission;
    }

    public function handle(): Collection
    {
        $dataPermission = $this->getDataPermissionService();
        $data = [];
        foreach ($dataPermission as $item)
        {
            $data[$item->code][] = $item;

        }
        return collect($data);
    }
}
