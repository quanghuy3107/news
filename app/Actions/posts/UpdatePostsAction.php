<?php

namespace App\Actions\posts;


use App\DTO\PostsDTO;
use App\Models\PostsModel;

class UpdatePostsAction
{
    public function __construct(
        protected PostsModel $postsModel
    )
    {
    }

    public function handle(PostsDTO $postsDTO){
        $file = $postsDTO->getImage();
        $ext = $file->extension();
        $file_name = md5(uniqid()) . '.' . $ext;
        $file->move(public_path('uploads'), $file_name);
        $id = $postsDTO->getPostsId();
        $data = [
            'Title' => $postsDTO->getTitle(),
            'Author' => $postsDTO->getAuthor(),
            'Image' => $file_name,
            'shortDescription' => $postsDTO->getShortDescription(),
            'Content' => $postsDTO->getContent(),
            'updated_at' => $postsDTO->getUpdateAt(),
        ];
        return $this->postsModel->updatePosts($id, $data);
    }
}
