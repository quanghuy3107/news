<?php

namespace App\Features\posts;

use App\Actions\posts\DeletePostsAction;
use App\DTO\posts\DeletePostsDTO;
use App\DTO\PostsDTO;

class DeletePostsFeature
{
    public function __construct(
        protected DeletePostsAction $deletePostsAction
    )
    {
    }

    private DeletePostsDTO $postsDTO;

    public function setPostsDTO(DeletePostsDTO $postsDTO): void
    {
        $this->postsDTO = $postsDTO;
    }

    public function getPostsDTO(): DeletePostsDTO
    {
        return $this->postsDTO;
    }

    public function handle(): int
    {
        return $this->deletePostsAction->handel($this->getPostsDTO());
    }
}
