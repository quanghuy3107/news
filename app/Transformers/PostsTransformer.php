<?php

namespace App\Transformers;


use Illuminate\Support\Collection;

class PostsTransformer
{

    private object $dataPost;

    public function setData(object $dataPost)
    {
        $this->dataPost = $dataPost;
    }

    public function transformer() : object
    {
        return $this->dataPost;
    }
}
