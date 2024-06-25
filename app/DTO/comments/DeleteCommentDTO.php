<?php

namespace App\DTO\comments;

class DeleteCommentDTO
{
    private int $commentId;

    public function getCommentId(): int
    {
        return $this->commentId;
    }

    public function setCommentId(int $commentId): void
    {
        $this->commentId = $commentId;
    }

    public function getCommentDTO() : DeleteCommentDTO
    {
        return $this;
    }
}
