<?php

namespace App\Actions\users;

use App\DTO\users\GetIdUserDTO;
use App\Models\User;

class GetUserByIdAction
{
    public function __construct(
        protected User $user
    )
    {
    }

    public function handle(GetIdUserDTO $getIdUserDTO): \Illuminate\Support\Collection
    {
        $id = $getIdUserDTO->getId();
        return $this->user->getUserById($id);
    }
}
