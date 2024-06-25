<?php

namespace App\Actions\posts;

use App\DTO\posts\DetailPostsDTO;
use App\Models\PostsModel;

class FindPostsAction
{
    public function __construct(protected PostsModel $postsModel)
    {
    }

    public function handle(DetailPostsDTO $data)
    {
        $id = $data->getPostsId();
        return $this->postsModel->findPostsById($id);
    }
}
