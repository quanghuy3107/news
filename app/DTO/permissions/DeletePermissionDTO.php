<?php

namespace App\DTO\permissions;

class DeletePermissionDTO
{
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDeletePermissionDTO(): DeletePermissionDTO
    {
        return $this;
    }
}
