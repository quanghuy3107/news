<?php

namespace App\Features\users;

use App\Actions\users\CreateUserAction;
use App\DTO\users\CreateUserDTO;

class CreateUserFeature
{
    public function __construct(
        protected CreateUserAction $createUserAction
    )
    {
    }

    private CreateUserDTO $createUserDTO;

    public function setCreateUserFeature(CreateUserDTO $createUserDTO): void
    {
        $this->createUserDTO = $createUserDTO;
    }

    public function getCreateUserFeature(): CreateUserDTO
    {
        return $this->createUserDTO;
    }

    public function handle(): bool
    {
        return $this->createUserAction->handle($this->getCreateUserFeature());
    }
}
