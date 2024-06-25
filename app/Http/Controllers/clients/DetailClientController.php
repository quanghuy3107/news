<?php

namespace App\Http\Controllers\clients;

use App\DTO\CommentDTO;
use App\DTO\comments\GetCommentDTO;
use App\DTO\posts\DetailPostsDTO;
use App\DTO\PostsDTO;
use App\Features\comments\GetCommentFeature;
use App\Features\posts\FindPostsFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\posts\FindPostsRequest;
use App\Http\Requests\clients\comments\FindCommentClientRequest;
use App\Http\Requests\clients\posts\FindPostsClientRequest;
use Illuminate\Http\Request;

class DetailClientController extends Controller
{
    public function __construct(
        protected FindPostsFeature $findPostsFeature,
        protected GetCommentDTO $commentDTO,
        protected GetCommentFeature $getCommentFeature
    )
    {
    }

    public function detail(FindPostsClientRequest $postsRequest, FindCommentClientRequest $findCommentClientRequest): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $title = "Trang chi tiết";
        $dto = $postsRequest->getDTO();
        $this->findPostsFeature->setPostsDTO($dto);
        $this->findPostsFeature->handle();
        $dataPosts = $this->findPostsFeature->getTransform();

        $dtoComment = $findCommentClientRequest->getDTO();
        $this->getCommentFeature->setCommentFeature($dtoComment);
        $this->getCommentFeature->handle();
        $dataComment = $this->getCommentFeature->getTransform();
        return view('clients.detail', compact('title','dataPosts', 'dataComment'));
    }

}
