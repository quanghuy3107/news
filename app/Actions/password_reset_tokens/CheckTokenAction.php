<?php

namespace App\Actions\password_reset_tokens;

use App\DTO\password_reset_tokens\FindTokenDTO;
use App\DTO\users\ChangePasswordUserDTO;
use App\Models\PasswordResetToken;
use App\Models\User;

class CheckTokenAction
{
    public function __construct(
        protected PasswordResetToken $passwordResetToken
    )
    {
    }

    public function handle(ChangePasswordUserDTO $userDTO,FindTokenDTO $findTokenDTO) :array
    {
        $id = $userDTO->getId();
        $data = User::find($id)->getAttributes();
        $email = $data['email'];
        $token = $findTokenDTO->getToken();

        $dataToken = $this->passwordResetToken->findToken($email,$token);
        if(!empty($dataToken)){
            $nowTime = new \DateTime();
            $minTimeToken = new \DateTime($dataToken->created_at);
            $maxTimeToken = new \DateTime($dataToken->created_at);
            $maxTimeToken->modify('+5 minutes');
            if($minTimeToken <= $nowTime && $nowTime <= $maxTimeToken){
                return $data;
            }
        }
        return [];
    }
}
