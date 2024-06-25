<?php

namespace App\Actions\posts;


use App\DTO\posts\UpdatePostsDTO;
use App\DTO\PostsDTO;
use App\Models\PostsModel;

class UpdatePostsAction
{
    const PATH_ROOT = './uploads/';
    public function __construct(
        protected PostsModel $postsModel
    )
    {
    }

    public function handle(UpdatePostsDTO $postsDTO): int
    {
        $id = $postsDTO->getPostsId();
        $check = false;
        $fileImage = null;
        if($postsDTO->getImage() != (object) NULL){
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
                'updated_at' => $postsDTO->getUpdateAt(),
            ];
            $check = true;

            $dataPostsOld = PostsModel::find($id)->first()->getAttributes();
            $fileImage = self::PATH_ROOT . $dataPostsOld['image'];

        }else{
            $data = [
                'title' => $postsDTO->getTitle(),
                'author' => $postsDTO->getAuthor(),
                'short_description' => $postsDTO->getShortDescription(),
                'content' => $postsDTO->getContent(),
                'updated_at' => $postsDTO->getUpdateAt(),
            ];
        }

        if($check && file_exists($fileImage)){
            unlink($fileImage);
        }
        return $this->postsModel->updatePosts($id, $data);
    }
}
