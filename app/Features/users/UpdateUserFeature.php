<?php

namespace App\Features\users;

use App\Actions\users\UpdateUserAction;
use App\DTO\users\UpdateUserDTO;

class UpdateUserFeature
{
    public function __construct(
        protected UpdateUserAction $updateUserAction
    )
    {
    }

    private UpdateUserDTO $updateUserDTO;

    public function setUpdateUserFeature(UpdateUserDTO $updateUserDTO) : void
    {
        $this->updateUserDTO = $updateUserDTO;
    }

    public function getUpdateUserFeature(): UpdateUserDTO
    {
        return $this->updateUserDTO;
    }

    public function handle(): bool
    {
        return $this->updateUserAction->handle($this->getUpdateUserFeature());
    }
}
