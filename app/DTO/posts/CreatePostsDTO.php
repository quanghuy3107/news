<?php

namespace App\DTO\posts;

class CreatePostsDTO
{

    private string $title;
    private string $author;
    private object $image;
    private string $shortDescription;
    private string $content;
    private string $created_at;

    public function getAuthor()
    {
        return $this->author;
    }


    public function getContent()
    {
        return $this->content;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function getTitle()
    {
        return $this->title;
    }


    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }


    public function setShortDescription($shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }


    public function setTitle($title): void
    {
        $this->title = $title;
    }


    public function getDTO() :  CreatePostsDTO
    {
        return $this;
    }
}

