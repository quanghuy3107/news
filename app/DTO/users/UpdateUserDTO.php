<?php

namespace App\DTO\users;

class UpdateUserDTO
{
    private int $id;
    private string $name;
    private string $email;
    private int $role;
    private array $permission;

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

    public function getUpdateUserDTO() : UpdateUserDTO
    {
        return $this;
    }
}
