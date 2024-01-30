<?php

namespace App\Actions\users;

use App\Models\User;

class GetUserAction
{
    public function __construct(
        protected User $user
    )
    {
    }

    public function handle()
    {
        return $this->user->getUser();
    }
}
