<?php

namespace App\DTO\users;

class GetIdUserDTO
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

    public function getIdUserDTO() : GetIdUserDTO
    {
        return $this;
    }
}
