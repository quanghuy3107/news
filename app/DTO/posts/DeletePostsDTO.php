<?php

namespace App\DTO\posts;

use App\Http\Requests\admins\posts\DeletePostsRequest;

class DeletePostsDTO
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


    public function getDTO() : DeletePostsDTO
    {
        return $this;
    }
}
