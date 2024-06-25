<?php

namespace App\DTO\categories_permission;

class CreateCategoryPermissionDTO
{
    private string $code;
    private string $createdAt;

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getCreateCategoryPermissionDTO() : CreateCategoryPermissionDTO
    {
        return $this;
    }
}
