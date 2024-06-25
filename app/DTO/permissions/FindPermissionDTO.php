<?php

namespace App\DTO\permissions;

class FindPermissionDTO
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

    public function getFindPermissionDTO(): FindPermissionDTO
    {
        return $this;
    }
}
