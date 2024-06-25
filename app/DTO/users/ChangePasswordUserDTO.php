<?php

namespace App\DTO\users;

use Carbon\Carbon;

class ChangePasswordUserDTO
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private Carbon $created_at;
    private Carbon $update_at;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }



    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    public function getUserDTO() : ChangePasswordUserDTO
    {
        return $this;
    }
}
