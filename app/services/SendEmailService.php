<?php

namespace App\services;

use App\DTO\password_reset_tokens\CreatePasswordResetTokenDTO;
use App\DTO\UserDTO;
use App\DTO\users\ForgotPasswordUserDTO;
use Illuminate\Support\Facades\Mail;

class SendEmailService
{
    private ForgotPasswordUserDTO $userDTO;
    private CreatePasswordResetTokenDTO $createPasswordResetTokenDTO;
    public function setUserData(ForgotPasswordUserDTO $userDTO) : void
    {
        $this->userDTO = $userDTO;
    }

    public function setCreatePasswordResetTokenService(CreatePasswordResetTokenDTO $createPasswordResetTokenDTO) : void
    {
        $this->createPasswordResetTokenDTO = $createPasswordResetTokenDTO;
    }

    public function getData() : ForgotPasswordUserDTO
    {
        return $this->userDTO;
    }

    public function getCreatePasswordResetTokenService(): CreatePasswordResetTokenDTO
    {
        return $this->createPasswordResetTokenDTO;
    }

    public function sendMail() : void
    {
        $id = $this->userDTO->getId();
        $name = $this->userDTO->getName();
        $email = $this->createPasswordResetTokenDTO->getEmail();
        $token = $this->createPasswordResetTokenDTO->getToken();
        Mail::send('mails.forgotPassword',compact('name','id','token'), function ($e) use($id, $email, $name) {
            $e -> subject('Lấy lại mật khẩu');
            $e -> to($email, $name);
        });
    }
}
