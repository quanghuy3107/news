<?php

namespace App\Features\posts;

use App\Actions\posts\UpdatePostsAction;
use App\DTO\posts\UpdatePostsDTO;
use App\DTO\PostsDTO;

class UpdatePostsFeature
{
    public function __construct(
        protected UpdatePostsAction $actionPosts
    )
    {
    }

    private UpdatePostsDTO $postDTO;

    public function getPostDTO(): UpdatePostsDTO
    {
        return $this->postDTO;
    }

    public function setPostDTO(UpdatePostsDTO $postDTO): void
    {
        $this->postDTO = $postDTO;
    }

    public function handle(): int
    {
        return $this->actionPosts->handle($this->getPostDTO());
    }
}
