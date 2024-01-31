<?php

namespace App\Features\comments;

use App\Actions\comments\DeleteCommentAction;
use App\DTO\CommentDTO;

class DeleteCommentFeature
{
    public function __construct(
        protected DeleteCommentAction $deleteCommentAction
    )
    {
    }

    private CommentDTO $commentDTO;

    public function setCommentDTO(CommentDTO $commentDTO) : void
    {
        $this->commentDTO = $commentDTO;
    }

    public function getCommentDTO() : CommentDTO
    {
        return $this->commentDTO;
    }

    public function handle() : void
    {
        $this->deleteCommentAction->handle($this->getCommentDTO());
    }
}
