<?php

namespace App\Features\posts;

use App\Actions\posts\UpdatePostsAction;
use App\DTO\PostsDTO;

class UpdatePostsFeature
{
    public function __construct(
        protected UpdatePostsAction $actionPosts
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
        return $this->actionPosts->handle($this->getPostDTO());
    }
}
