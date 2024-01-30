<?php

namespace App\Features\comments;

use App\Actions\comments\CreateCommentAction;
use App\DTO\CommentDTO;

class CreateCommentFeature
{
    public function __construct(
        protected CreateCommentAction $createCommentAction
    )
    {
    }

    private CommentDTO $commentDTO;
    public function setComment(CommentDTO $commentDTO) : void
    {
        $this->commentDTO = $commentDTO;
    }

    public function getComment() : CommentDTO
    {
        return $this->commentDTO;
    }

    public function handle()
    {
        $this->createCommentAction->handle($this->getComment());
    }
}
