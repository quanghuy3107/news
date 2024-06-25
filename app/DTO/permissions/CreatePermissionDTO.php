<?php

namespace App\DTO\permissions;

class CreatePermissionDTO
{
    private string $name;
    private string $createdAt;
    private int $desc;

    public function getDesc(): int
    {
        return $this->desc;
    }

    public function setDesc(int $desc): void
    {
        $this->desc = $desc;
    }



    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatePermission(): CreatePermissionDTO
    {
        return $this;
    }
}
