<?php

namespace App\Features\users;

use App\Actions\users\ChangePasswordAction;
use App\DTO\UserDTO;

class ChangePasswordFeature
{
    public function __construct(
        protected ChangePasswordAction $changePasswordAction
    )
    {
    }

    private UserDTO $userDTO;

    public function setDataDTO(UserDTO $userDTO)
    {
        $this->userDTO = $userDTO;
    }

    public function getDataDTO() : UserDTO
    {
        return $this->userDTO;
    }

    public function handle()
    {
        return $this->changePasswordAction->handle($this->getDataDTO());
    }
}
