<?php

namespace App\Actions\users;

use App\DTO\UserDTO;
use App\Models\User;

class ChangePasswordAction
{
    public function __construct(
        protected User $user
    )
    {
    }

    public function handle(UserDTO $userDTO)
    {
        $data = [
            'password' =>bcrypt($userDTO->getPassword()),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];
        $id = $userDTO->getId();

        return $this->user->updateUserById($id, $data);
    }
}
