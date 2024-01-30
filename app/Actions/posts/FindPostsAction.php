<?php

namespace App\Actions\posts;

use App\DTO\PostsDTO;
use App\Models\PostsModel;

class FindPostsAction
{
    public function __construct(protected PostsModel $postsModel)
    {
    }

    public function handle(PostsDTO $data)
    {
        $id = $data->getPostsId();
        return $this->postsModel->findPostsById($id);
    }
}
