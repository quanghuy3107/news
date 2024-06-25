<?php

namespace App\Features\users;

use App\Actions\users\CheckUserAction;
use App\DTO\UserDTO;
use App\DTO\users\LoginUserDTO;
use App\Transformers\UserTransformer;

class CheckUserFeature
{
    public function __construct(
        protected CheckUserAction $checkUserAction,
        protected UserTransformer $userTransformer
    )
    {
    }
    private LoginUserDTO $userDTO;
    public function setDTO(LoginUserDTO $userDTO): void
    {
        $this->userDTO = $userDTO;
    }

    public function getDTO(): LoginUserDTO
    {
        return $this->userDTO;
    }


    public function handle(): bool
    {
        return $this->checkUserAction->handle($this->userDTO);
    }
}
