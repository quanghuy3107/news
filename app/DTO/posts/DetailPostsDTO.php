<?php

namespace App\DTO\posts;

class DetailPostsDTO
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


    public function getDTO()
    {
        return $this;
    }
}
