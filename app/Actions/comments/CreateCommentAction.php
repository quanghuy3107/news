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
            'content' => $commentDTO->getContent(),
            'user_id' => $commentDTO->getUserId(),
            'created_at' => $commentDTO->getCreatedAt(),
            'parent_comment_id' => $parentComment,
            'posts_id' => $commentDTO->getPostsId()
        ];
        $this->commentModel->createComment($data);
    }
}
