<?php

namespace App\Actions\users;

use App\DTO\UserDTO;
use App\Models\User;

class CheckEmailAction
{
    public function __construct(
        protected User $user
    )
    {
    }

    public function handle(UserDTO $userDTO)
    {
         return $this->user->checkEmail($userDTO->getEmail());
    }
}
