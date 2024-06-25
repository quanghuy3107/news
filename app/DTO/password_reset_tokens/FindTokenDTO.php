<?php

namespace App\DTO\password_reset_tokens;

class FindTokenDTO
{
    private string $email;
    private string $token;
    private string $createAt;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getCreateAt(): string
    {
        return $this->createAt;
    }

    public function setCreateAt(string $createAt): void
    {
        $this->createAt = $createAt;
    }

    public function getFindToken(): FindTokenDTO
    {
        return $this;
    }
}
