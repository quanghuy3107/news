<?php

namespace App\Features\users;

use App\Actions\users\DeleteUserAction;
use App\DTO\UserDTO;

class DeleteUserFeature
{

    public function __construct(
        protected DeleteUserAction $deleteUserAction
    )
    {
    }

    private UserDTO $userDTO;
    public function setUserDTO(UserDTO $userDTO){
        $this->userDTO = $userDTO;
    }

    public function  getUserDTO()
    {
        return $this->userDTO;
    }

    public function handle()
    {
        return $this->deleteUserAction->handel($this->getUserDTO());
    }
}
