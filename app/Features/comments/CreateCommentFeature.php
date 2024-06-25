<?php

namespace App\Features\comments;

use App\Actions\comments\CreateCommentAction;
use App\DTO\CommentDTO;
use App\DTO\comments\CreateCommentDTO;

class CreateCommentFeature
{
    public function __construct(
        protected CreateCommentAction $createCommentAction
    )
    {
    }

    private CreateCommentDTO $commentDTO;
    public function setComment(CreateCommentDTO $commentDTO) : void
    {
        $this->commentDTO = $commentDTO;
    }

    public function getComment() : CreateCommentDTO
    {
        return $this->commentDTO;
    }

    public function handle(): void
    {
        $this->createCommentAction->handle($this->getComment());
    }
}
