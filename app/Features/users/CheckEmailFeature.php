<?php

namespace App\Features\users;

use App\Actions\users\CheckEmailAction;
use App\Actions\users\CheckUserAction;
use App\DTO\password_reset_tokens\CreatePasswordResetTokenDTO;
use App\DTO\UserDTO;
use App\DTO\users\ForgotPasswordUserDTO;
use App\services\SendEmailService;

class CheckEmailFeature
{
    public function __construct(
        protected CheckEmailAction $checkEmailAction,
        protected SendEmailService $sendEmailService,
//        protected UserDTO $userDTO
    )
    {
    }

    private ForgotPasswordUserDTO $userDTO;
    private CreatePasswordResetTokenDTO $createPasswordResetTokenDTO;

    public function setUserDTO(ForgotPasswordUserDTO $userDTO): void
    {
        $this->userDTO = $userDTO;
    }

    public function getUserDTO() : ForgotPasswordUserDTO
    {
        return $this->userDTO;

    }

    public function setPasswordResetToken(CreatePasswordResetTokenDTO $createPasswordResetTokenDTO): void
    {
        $this->createPasswordResetTokenDTO = $createPasswordResetTokenDTO;
    }

    public function getPasswordResetToken(): CreatePasswordResetTokenDTO
    {
        return $this->createPasswordResetTokenDTO;
    }

    public function handle() : void
    {
        $data = $this->checkEmailAction->handle($this->getUserDTO(), $this->getPasswordResetToken());

        $this->userDTO->setId($data['user']->id);
        $this->userDTO->setName($data['user']->name);

        $this->createPasswordResetTokenDTO->setEmail($data['tokens']->email);
        $this->createPasswordResetTokenDTO->setToken($data['tokens']->token);

        if(!empty($data)){
            $this->sendEmailService->setCreatePasswordResetTokenService($this->getPasswordResetToken());
            $this->sendEmailService->setUserData($this->getUserDTO());
            $this->sendEmailService->sendMail();
        }
    }
}
