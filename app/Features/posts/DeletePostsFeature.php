<?php

namespace App\Features\posts;

use App\Actions\posts\DeletePostsAction;
use App\DTO\PostsDTO;

class DeletePostsFeature
{
    public function __construct(
        protected DeletePostsAction $deletePostsAction
    )
    {
    }

    private PostsDTO $postsDTO;

    public function setPostsDTO(PostsDTO $postsDTO)
    {
        $this->postsDTO = $postsDTO;
    }

    public function getPostsDTO(){
        return $this->postsDTO;
    }

    public function handle()
    {
        return $this->deletePostsAction->handel($this->getPostsDTO());
    }
}
