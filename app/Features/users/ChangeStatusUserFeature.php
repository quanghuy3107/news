<?php

namespace App\Features\users;

use App\Actions\users\ChangeStatusUserAction;
use App\DTO\users\ChangeStatusUserDTO;

class ChangeStatusUserFeature
{
    public function __construct(
        protected ChangeStatusUserAction $changeStatusUserAction
    )
    {
    }

    private ChangeStatusUserDTO $changeStatusUserDTO;

    public function setChangeStatusFeature(ChangeStatusUserDTO $changeStatusUserDTO): void
    {
        $this->changeStatusUserDTO = $changeStatusUserDTO;
    }

    public function getChangeStatusFeature(): ChangeStatusUserDTO
    {
        return $this->changeStatusUserDTO;
    }

    public function handle(): bool|int
    {
        return $this->changeStatusUserAction->handle($this->getChangeStatusFeature());
    }
}
