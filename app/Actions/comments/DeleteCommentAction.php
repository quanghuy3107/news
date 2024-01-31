<?php

namespace App\Actions\comments;

use App\DTO\CommentDTO;
use App\Models\CommentModel;

class DeleteCommentAction
{
    public function __construct(
        protected CommentModel $commentModel
    )
    {
    }

    public function handle(CommentDTO $commentDTO) : void
    {
        $commentId = $commentDTO->getCommentId();
        $this->commentModel->softDeleteComment($commentId);
    }
}
