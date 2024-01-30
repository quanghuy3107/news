<?php

namespace App\Features\posts;

use App\Actions\posts\CreatePostAction;
use App\DTO\PostsDTO;

class CreatePostFeature
{
    public function __construct(
        protected CreatePostAction $actionPost,
    )
    {

    }
    private PostsDTO $postDTO;

    public function getPostDTO(): PostsDTO
    {
        return $this->postDTO;
    }

    public function setPostDTO(PostsDTO $postDTO): void
    {
        $this->postDTO = $postDTO;
    }

    public function handle()
    {
        return $this->actionPost->handle($this->getPostDTO());
    }
}
