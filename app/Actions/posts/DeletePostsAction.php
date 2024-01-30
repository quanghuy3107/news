<?php

namespace App\Actions\posts;

use App\DTO\PostsDTO;
use App\Models\PostsModel;

class DeletePostsAction
{
    public function __construct(
        protected PostsModel $postsModel
    )
    {
    }

    public function handel(PostsDTO $postsDTO){
        $id = $postsDTO->getPostsId();
        return $this->postsModel->deletePosts($id);
    }

}
