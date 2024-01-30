<?php

namespace App\Features\posts;

use App\Actions\posts\FindPostsAction;
use App\DTO\PostsDTO;
use App\Transformers\PostsTransformer;

class FindPostsFeature
{
    public function __construct(
        protected FindPostsAction $findPostsAction,
        protected PostsTransformer $postTransformer
    )
    {
    }

    private PostsDTO $postsDTO;

    public function setPostsDTO(PostsDTO $postsDTO){
        $this->postsDTO = $postsDTO;
    }

    public function getPostsDTO()
    {
        return $this->postsDTO;
    }

    public function getTransform()
    {
        return $this->postTransformer->transformer();
    }

    public function handle()
    {
        $dataPosts =  $this->findPostsAction->handle($this->getPostsDTO());
        $this->postTransformer->setData($dataPosts);
    }
}
