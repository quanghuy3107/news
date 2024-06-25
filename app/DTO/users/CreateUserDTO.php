<?php

namespace App\DTO\users;

class CreateUserDTO
{
    private string $name;
    private string $email;
    private string $password;
    private int $role;
    private array $permission;

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

    public function getRole(): int
    {
        return $this->role;
    }

    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    public function getPermission(): array
    {
        return $this->permission;
    }

    public function setPermission(array $permission): void
    {
        $this->permission = $permission;
    }

    public function getCreateUserDTO() : CreateUserDTO
    {
        return $this;
    }
}
