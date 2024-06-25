<?php

namespace App\Actions\users;

use App\DTO\password_reset_tokens\CreatePasswordResetTokenDTO;
use App\DTO\UserDTO;
use App\DTO\users\ForgotPasswordUserDTO;
use App\Models\PasswordResetToken;
use App\Models\User;

class CheckEmailAction
{
    public function __construct(
        protected User $user,
        protected PasswordResetToken $passwordResetToken
    )
    {
    }

    public function handle(ForgotPasswordUserDTO $userDTO, CreatePasswordResetTokenDTO $createPasswordResetTokenDTO): array
    {

        $dataPassword = PasswordResetToken::where('email', $createPasswordResetTokenDTO->getEmail())->get()->first();
        $dataToken = [
            'email' => $createPasswordResetTokenDTO->getEmail(),
            'token' => $createPasswordResetTokenDTO->getToken(),
            'created_at' => $createPasswordResetTokenDTO->getCreateAt()
        ];
        if(empty($dataPassword)){
            $this->passwordResetToken->insertToken($dataToken);
        }else{
            $this->passwordResetToken->updateToken($dataToken);
        }
        $data['user'] = $this->user->checkEmail($userDTO->getEmail());
        $data['tokens'] = $this->passwordResetToken->selectToken($createPasswordResetTokenDTO->getEmail());
        return $data;
    }
}
