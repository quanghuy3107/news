<?php

namespace App\Features\users;

use App\Actions\users\DeleteUserAction;
use App\DTO\UserDTO;
use App\DTO\users\DeleteUserDTO;

class DeleteUserFeature
{

    public function __construct(
        protected DeleteUserAction $deleteUserAction
    )
    {
    }

    private DeleteUserDTO $userDTO;
    public function setUserDTO(DeleteUserDTO $userDTO): void
    {
        $this->userDTO = $userDTO;
    }

    public function getUserDTO() : DeleteUserDTO
    {
        return $this->userDTO;
    }

    public function handle(): int
    {
        return $this->deleteUserAction->handel($this->getUserDTO());
    }
}
