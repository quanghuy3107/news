<?php

namespace App\Features\users;

use App\Actions\password_reset_tokens\CheckTokenAction;
use App\Actions\password_reset_tokens\DeleteTokenAction;
use App\Actions\users\ChangePasswordAction;
use App\DTO\password_reset_tokens\FindTokenDTO;
use App\DTO\UserDTO;
use App\DTO\users\ChangePasswordUserDTO;

class ChangePasswordFeature
{
    public function __construct(
        protected ChangePasswordAction $changePasswordAction,
        protected CheckTokenAction $checkTokenAction,
        protected DeleteTokenAction $deleteTokenAction
    )
    {
    }

    private ChangePasswordUserDTO $userDTO;
    private FindTokenDTO $findTokenDTO;

    public function setDataDTO(ChangePasswordUserDTO $userDTO): void
    {
        $this->userDTO = $userDTO;
    }

    public function setTokenDTO(FindTokenDTO $findTokenDTO) : void
    {
        $this->findTokenDTO = $findTokenDTO;
    }

    public function getDataDTO() : ChangePasswordUserDTO
    {
        return $this->userDTO;
    }

    public function getTokenDTO() : FindTokenDTO
    {
        return $this->findTokenDTO;
    }

    public function handle(): bool
    {
        $status = $this->checkTokenAction->handle($this->getDataDTO(), $this->getTokenDTO());

        if($status){
            $email = $status['email'];
            $statusDelete = $this->deleteTokenAction->handle($email);
            if($statusDelete){
                $this->changePasswordAction->handle($this->getDataDTO());
                return true;
            }
        }
        return false;
    }
}
