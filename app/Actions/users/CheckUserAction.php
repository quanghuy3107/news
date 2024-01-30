<?php

namespace App\Actions\users;

use App\DTO\UserDTO;
use Illuminate\Support\Facades\Auth;

class CheckUserAction
{
    public function handle(UserDTO $userDTO)
    {
        return Auth::attempt(['email' => $userDTO -> getEmail(), 'password' => $userDTO -> getPassword(), 'is_deleted' => 0]);
    }
}
