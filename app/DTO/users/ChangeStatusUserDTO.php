<?php

namespace App\DTO\users;

class ChangeStatusUserDTO
{
    private string $status;
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }



    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getChangeStatusUserDTO() : ChangeStatusUserDTO
    {
        return $this;
    }
}
