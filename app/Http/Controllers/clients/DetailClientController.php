<?php

namespace App\Http\Controllers\clients;

use App\DTO\CommentDTO;
use App\DTO\PostsDTO;
use App\Features\comments\GetCommentFeature;
use App\Features\posts\FindPostsFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\posts\FindPostsRequest;
use Illuminate\Http\Request;

class DetailClientController extends Controller
{
    public function __construct(
        protected PostsDTO $postsDTO,
        protected FindPostsFeature $findPostsFeature,
        protected CommentDTO $commentDTO,
        protected GetCommentFeature $getCommentFeature
    )
    {
    }

    public function detail($id = 0)
    {

        $title = "Trang chi tiết";
        $this->postsDTO->setPostsId($id);
        $dto = $this->postsDTO->getDTO();
        $this->findPostsFeature->setPostsDTO($dto);
        $this->findPostsFeature->handle();
        $dataPosts = $this->findPostsFeature->getTransform();

        // comment
        $this->commentDTO->setPostsId($id);
        $dtoComment = $this->commentDTO->getCommentDTO();
        $this->getCommentFeature->setCommentFeature($dtoComment);
        $this->getCommentFeature->handle();
        $dataComment = $this->getCommentFeature->getTransform();
        return view('clients.detail', compact('title','dataPosts', 'dataComment'));
    }

}
