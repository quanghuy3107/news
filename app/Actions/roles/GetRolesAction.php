<?php

namespace App\Actions\roles;

use App\Models\Role;

class GetRolesAction
{
    public function __construct(
        protected Role $role
    )
    {
    }

    public function handle(): \Illuminate\Support\Collection
    {
        return $this->role->getAllRole();
    }
}
