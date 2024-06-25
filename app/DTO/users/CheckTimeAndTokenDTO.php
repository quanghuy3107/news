<?php

namespace App\DTO\users;

class CheckTimeAndTokenDTO
{
    private int $id;
    private string $token;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }
    public function getCheckTimeAndToken(): CheckTimeAndTokenDTO
    {
        return $this;
    }
}
