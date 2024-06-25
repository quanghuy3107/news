<?php

namespace App\DTO\comments;

class GetCommentDTO
{
    private int $postsId;

    public function getPostsId(): int
    {
        return $this->postsId;
    }

    public function setPostsId(int $postsId): void
    {
        $this->postsId = $postsId;
    }


    public function getCommentDTO() : GetCommentDTO
    {
        return $this;
    }
}
