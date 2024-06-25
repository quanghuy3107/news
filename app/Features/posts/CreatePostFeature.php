<?php

namespace App\Features\posts;

use App\Actions\posts\CreatePostAction;
use App\DTO\posts\CreatePostsDTO;
use App\DTO\PostsDTO;

class CreatePostFeature
{
    public function __construct(
        protected CreatePostAction $actionPost,
    )
    {

    }
    private CreatePostsDTO $postDTO;

    public function getPostDTO(): CreatePostsDTO
    {
        return $this->postDTO;
    }

    public function setPostDTO(CreatePostsDTO $postDTO): void
    {
        $this->postDTO = $postDTO;
    }

    public function handle(): bool
    {
        return $this->actionPost->handle($this->getPostDTO());
    }
}
