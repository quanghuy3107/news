<?php

namespace App\Actions\comments;

use App\DTO\CommentDTO;
use App\DTO\comments\DeleteCommentDTO;
use App\Models\CommentModel;

class DeleteCommentAction
{
    public function __construct(
        protected CommentModel $commentModel
    )
    {
    }

    public function handle(DeleteCommentDTO $commentDTO) : void
    {
        $commentId = $commentDTO->getCommentId();
        $this->commentModel->softDeleteComment($commentId);
    }
}
