<?php

namespace App\Actions\users;

use App\DTO\users\ChangeStatusUserDTO;
use App\Enums\TaskUserStatus;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ChangeStatusUserAction
{
    public function __construct(
        protected User $user
    )
    {
    }

    public function handle(ChangeStatusUserDTO $changeStatusUserDTO): bool|int
    {
        $id = $changeStatusUserDTO->getId();
        $statusOld = $changeStatusUserDTO->getStatus();

        if($statusOld == 'activity'){
            $statusNew = TaskUserStatus::Blocked;
        }else if($statusOld == 'blocked'){
            $statusNew = TaskUserStatus::Activity;
        }else{
            return false;
        }
        $sessionKey = 'user_' . $id;

        session()->forget($sessionKey);
        return $this->user->changeStatus($id,$statusNew);
    }
}
