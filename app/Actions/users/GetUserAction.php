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

    public function handle(): \Illuminate\Support\Collection
    {
        return $this->user->getUser();
    }
}
