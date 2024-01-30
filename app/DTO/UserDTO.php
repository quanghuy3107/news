<?php

namespace App\DTO;

use Carbon\Carbon;

class UserDTO
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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

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

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function setCreatedAt(Carbon $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdateAt(): Carbon
    {
        return $this->update_at;
    }

    public function setUpdateAt(Carbon $update_at): void
    {
        $this->update_at = $update_at;
    }

    public function getUserDTO(){
        return $this;
    }
}
