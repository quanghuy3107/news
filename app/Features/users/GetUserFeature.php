<?php

namespace App\Features\users;

use App\Actions\users\GetUserAction;
use App\Transformers\UserTransformer;

class GetUserFeature
{
    public function __construct(
        protected GetUserAction   $userAction,
        protected UserTransformer $userTransformer
    )
    {
    }

    public function getTransformer(): object
    {
        return $this->userTransformer->transformer();
    }

    public function handle(): void
    {
        $data = $this->userAction->handle();
        $this->userTransformer->setData($data);
    }
}
