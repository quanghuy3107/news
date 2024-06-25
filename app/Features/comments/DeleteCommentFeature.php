<?php

namespace App\Features\comments;

use App\Actions\comments\DeleteCommentAction;
use App\DTO\CommentDTO;
use App\DTO\comments\DeleteCommentDTO;

class DeleteCommentFeature
{
    public function __construct(
        protected DeleteCommentAction $deleteCommentAction
    )
    {
    }

    private DeleteCommentDTO $commentDTO;

    public function setCommentDTO(DeleteCommentDTO $commentDTO) : void
    {
        $this->commentDTO = $commentDTO;
    }

    public function getCommentDTO() : DeleteCommentDTO
    {
        return $this->commentDTO;
    }

    public function handle() : void
    {
        $this->deleteCommentAction->handle($this->getCommentDTO());
    }
}
