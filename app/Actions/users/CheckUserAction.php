<?php

namespace App\Actions\users;

use App\DTO\UserDTO;
use App\DTO\users\LoginUserDTO;
use App\Enums\TaskSoftDelete;
use App\Enums\TaskUserStatus;
use Illuminate\Support\Facades\Auth;

class CheckUserAction
{
    public function handle(LoginUserDTO $userDTO): bool
    {
        return Auth::attempt(['email' => $userDTO->getEmail(), 'password' => $userDTO->getPassword(), 'is_deleted' => TaskSoftDelete::NotDeleted, 'status' => TaskUserStatus::Activity]);
    }
}
