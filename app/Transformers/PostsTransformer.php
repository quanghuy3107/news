<?php

namespace App\Transformers;


use Illuminate\Support\Collection;

class PostsTransformer
{

    private $dataPost;

    public function setData($dataPost)
    {
        $this->dataPost = $dataPost;
    }

    public function transformer()
    {
        return $this->dataPost;
    }
}
