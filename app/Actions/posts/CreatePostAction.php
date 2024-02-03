<?php

namespace App\Actions\posts;

use App\DTO\PostsDTO;
use App\Models\PostsModel;

class CreatePostAction
{
    public function __construct(protected PostsModel $posts)
    {
    }

    public function handle(PostsDTO $postsDTO)
    {

        $file = $postsDTO->getImage();
        $ext = $file->extension();
        $file_name = md5(uniqid()) . '.' . $ext;
        $file->move(public_path('uploads'), $file_name);
        $data = [
          'title' => $postsDTO->getTitle(),
          'author' => $postsDTO->getAuthor(),
          'image' => $file_name,
          'short_description' => $postsDTO->getShortDescription(),
          'content' => $postsDTO->getContent(),
          'created_at' => $postsDTO->getCreatedAt(),
        ];
            return $this->posts->addPosts($data);
    }
}
