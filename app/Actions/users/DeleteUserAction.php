<?php

namespace App\Actions\users;

use App\DTO\UserDTO;
use App\Models\User;

class DeleteUserAction
{
    public function __construct(
        protected User $user
    )
    {
    }

    public function handel(UserDTO $data)
    {
        $id = $data->getId();
        return $this->user->softDeleteUser($id);
    }
}
