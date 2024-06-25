<?php

namespace App\Features\users;

use App\Actions\users\GetUserByIdAction;
use App\DTO\users\GetIdUserDTO;
use App\Transformers\UserTransformer;

class GetUserByIdFeature
{
    public function __construct(
        protected GetUserByIdAction $getUserByIdAction,
        protected UserTransformer $userTransformer
    )
    {
    }

    private GetIdUserDTO $getIdUserDTO;

    public function setUserByIdFeature(GetIdUserDTO $getIdUserDTO) : void
    {
        $this->getIdUserDTO = $getIdUserDTO;
    }

    public function getUserByIdFeature(): GetIdUserDTO
    {
        return $this->getIdUserDTO;
    }

    public function getDataUserTransformer(): object
    {
        return $this->userTransformer->transformer();
    }

    public function handle(): void
    {
        $data = $this->getUserByIdAction->handle($this->getUserByIdFeature());
        $this->userTransformer->setData($data);
    }
}
