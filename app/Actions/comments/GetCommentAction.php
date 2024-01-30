<?php

namespace App\Actions\comments;

use App\DTO\CommentDTO;
use App\Models\CommentModel;

class GetCommentAction
{
    public function __construct(
        protected CommentModel $commentModel
    )
    {
    }

    public function handle(CommentDTO $commentDTO)
    {
        $postId = $commentDTO->getPostsId();
        return $this->commentModel->getComment($postId);
    }
}
