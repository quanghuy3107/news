<?php

namespace App\DTO\users;

use Carbon\Carbon;

class DeleteUserDTO
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


    public function getUserDTO(){
        return $this;
    }
}
