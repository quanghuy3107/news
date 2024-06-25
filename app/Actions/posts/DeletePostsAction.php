<?php

namespace App\Actions\posts;

use App\DTO\posts\DeletePostsDTO;
use App\DTO\PostsDTO;
use App\Models\PostsModel;

class DeletePostsAction
{
    public function __construct(
        protected PostsModel $postsModel
    )
    {
    }

    public function handel(DeletePostsDTO $postsDTO){
        $id = $postsDTO->getPostsId();
        return $this->postsModel->deletePosts($id);
    }

}
