<?php

namespace App\services;

use App\DTO\UserDTO;
use Illuminate\Support\Facades\Mail;

class SendEmailService
{
    private UserDTO $userDTO;
    public function setUserData(UserDTO $userDTO){
        $this->userDTO = $userDTO;
    }

    public function getData(){
        return $this->userDTO;
    }

    public function sendMail()
    {
        $id = $this->userDTO->getId();
        $name = $this->userDTO->getName();
        $email = $this->userDTO->getEmail();
        Mail::send('mails.forgotPassword',compact('name','id'), function ($e) use($id, $email, $name) {
            $e -> subject('Lấy lại mật khẩu');
            $e -> to($email, $name);
        });
    }
}
