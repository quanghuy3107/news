<?php

namespace App\DTO\posts;

class UpdatePostsDTO
{

    private int $postsId;
    private string $title;
    private string $author;
    private object $image;
    private string $shortDescription;
    private string $content;
    private string $update_at;

    public function getAuthor()
    {
        return $this->author;
    }


    public function getContent()
    {
        return $this->content;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getPostsId()
    {
        return $this->postsId;
    }

    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUpdateAt()
    {
        return $this->update_at;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function setPostsId($postsId): void
    {
        $this->postsId = $postsId;
    }

    public function setShortDescription($shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function setUpdateAt($update_at): void
    {
        $this->update_at = $update_at;
    }

    public function getDTO() {
        return $this;
    }
}
