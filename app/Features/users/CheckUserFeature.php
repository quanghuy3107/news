<?php

namespace App\Features\users;

use App\Actions\users\CheckUserAction;
use App\DTO\UserDTO;
use App\Transformers\UserTransformer;

class CheckUserFeature
{
    public function __construct(
        protected CheckUserAction $checkUserAction,
        protected UserTransformer $userTransformer
    )
    {
    }
    private UserDTO $userDTO;
    public function setDTO(UserDTO $userDTO)
    {
        $this->userDTO = $userDTO;
    }

    public function getDTO()
    {
        return $this->userDTO;
    }


    public function handle()
    {
        return $this->checkUserAction->handle($this->userDTO);
    }
}
