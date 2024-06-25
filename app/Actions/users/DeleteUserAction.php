<?php

namespace App\Actions\users;

use App\DTO\UserDTO;
use App\DTO\users\DeleteUserDTO;
use App\Models\User;

class DeleteUserAction
{
    public function __construct(
        protected User $user
    )
    {
    }

    public function handel(DeleteUserDTO $data): int
    {
        $id = $data->getId();
        return $this->user->softDeleteUser($id);
    }
}
