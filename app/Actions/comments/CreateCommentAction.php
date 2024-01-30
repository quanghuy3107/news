<?php

namespace App\Actions\comments;

use App\DTO\CommentDTO;
use App\Models\CommentModel;

class CreateCommentAction
{
    public function __construct(
        protected CommentModel $commentModel
    )
    {
    }

    public function handle(CommentDTO $commentDTO)
    {
//        dd($commentDTO->getParentComment());
        $parentComment = null;
        if($commentDTO->getParentComment() != 0){
            $parentComment = $commentDTO->getParentComment();
        }
        $data = [
            'Content' => $commentDTO->getContent(),
            'UserId' => $commentDTO->getUserId(),
            'created_at' => $commentDTO->getCreatedAt(),
            'ParentCommentId' => $parentComment,
            'PostsId' => $commentDTO->getPostsId()
        ];
        $this->commentModel->createComment($data);
    }
}
