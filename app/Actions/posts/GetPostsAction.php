<?php

namespace App\Actions\posts;

use App\Models\PostsModel;
use Illuminate\Support\Collection;

class GetPostsAction
{
    public function __construct(protected PostsModel $postsModel)
    {
    }

    public function handle(): Collection
    {
        return $this->postsModel->getAllPosts();
    }
}
