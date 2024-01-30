<?php

namespace App\Features\users;

use App\Actions\users\CheckEmailAction;
use App\Actions\users\CheckUserAction;
use App\DTO\UserDTO;
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

    private UserDTO $userDTO;

    public function setUserDTO($userDTO)
    {
        $this->userDTO = $userDTO;
    }

    public function getUserDTO(){
        return $this->userDTO;

    }

    public function handle() : void{
        $data = $this->checkEmailAction->handle($this->getUserDTO());

        $this->userDTO->setId($data->id);
        $this->userDTO->setEmail($data->email);
        $this->userDTO->setName($data->name);
        if(!empty($data)){
            $this->sendEmailService->setUserData($this->getUserDTO());
            $this->sendEmailService->sendMail();
        }
    }
}
