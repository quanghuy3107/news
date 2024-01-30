<?php

namespace App\DTO;

class CommentDTO
{
    private int $commentId;
    private string $content;
    private int $userId;
    private string $created_at;
    private int $parentComment;
    private int $is_deleted;
    private int $postsId;

    public function getPostsId(): int
    {
        return $this->postsId;
    }

    public function setPostsId(int $postsId): void
    {
        $this->postsId = $postsId;
    }

    public function getCommentId(): int
    {
        return $this->commentId;
    }

    public function setCommentId(int $commentId): void
    {
        $this->commentId = $commentId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getParentComment(): int
    {
        if(isset($this->parentComment)){
            return $this->parentComment;
        }
        return 0;
    }

    public function setParentComment(int $parentComment): void
    {
        $this->parentComment = $parentComment;
    }

    public function getIsDeleted(): int
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(int $is_deleted): void
    {
        $this->is_deleted = $is_deleted;
    }

    public function getCommentDTO(){
        return $this;
    }
}
