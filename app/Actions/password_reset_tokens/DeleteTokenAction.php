<?php

namespace App\Actions\password_reset_tokens;

use App\DTO\password_reset_tokens\FindTokenDTO;
use App\Models\PasswordResetToken;


class DeleteTokenAction
{
    public function __construct(
        protected PasswordResetToken $passwordResetToken
    )
    {
    }

    public function handle(string $email): int
    {
        return $this->passwordResetToken->deleteToken($email);
    }
}
