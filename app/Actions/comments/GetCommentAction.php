<?php

namespace App\Actions\comments;

use App\DTO\CommentDTO;
use App\DTO\comments\GetCommentDTO;
use App\Models\CommentModel;
use Illuminate\Support\Collection;

class GetCommentAction
{
    public function __construct(
        protected CommentModel $commentModel
    )
    {
    }

    public function handle(GetCommentDTO $commentDTO): Collection
    {
        $postId = $commentDTO->getPostsId();
        return $this->commentModel->getComment($postId);
    }
}
