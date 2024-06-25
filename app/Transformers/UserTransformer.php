<?php

namespace App\Transformers;

class UserTransformer
{
    private object $dataPost;

    public function setData(object $dataPost) : void
    {
        $this->dataPost = $dataPost;
    }

    public function transformer() : object
    {
        return $this->dataPost;
    }
}
