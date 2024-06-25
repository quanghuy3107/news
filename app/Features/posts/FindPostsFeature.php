<?php

namespace App\Features\posts;

use App\Actions\posts\FindPostsAction;
use App\DTO\posts\DetailPostsDTO;
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

    private DetailPostsDTO $postsDTO;

    public function setPostsDTO(DetailPostsDTO $postsDTO){
        $this->postsDTO = $postsDTO;
    }

    public function getPostsDTO(): DetailPostsDTO
    {
        return $this->postsDTO;
    }

    public function getTransform(): object
    {
        return $this->postTransformer->transformer();
    }

    public function handle(): void
    {
        $dataPosts =  $this->findPostsAction->handle($this->getPostsDTO());
        $this->postTransformer->setData($dataPosts);
    }
}
