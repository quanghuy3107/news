<?php

namespace App\Transformers;

class UserTransformer
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
