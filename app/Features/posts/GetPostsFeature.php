<?php

namespace App\Features\posts;

use App\Actions\posts\GetPostsAction;
use App\Transformers\PostsTransformer;

class GetPostsFeature
{
    public function __construct(
        protected GetPostsAction $actionPost,
        protected PostsTransformer $postTransformer
    )
    {

    }

    public function getTransform(): object
    {
        return $this->postTransformer->transformer();
    }

    public function handle(): void
    {
        $dataPosts =  $this->actionPost->handle();
        $this->postTransformer->setData($dataPosts);
    }
}
