<?php

namespace App\DTO\users;

use Carbon\Carbon;

class LoginUserDTO
{
    private string $email;
    private string $password;


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    public function getUserDTO() : LoginUserDTO
    {
        return $this;
    }
}
