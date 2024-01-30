<?php

namespace App\Transformers;

use App\DTO\CommentDTO;

class CommentTransformer
{
    private $dataComment;

    public function setDataComment(array $commentDTO) : void
    {
        $this->dataComment = $commentDTO;
    }

    public function getDataTransformer() : array
    {
        return $this->dataComment;
    }
}
