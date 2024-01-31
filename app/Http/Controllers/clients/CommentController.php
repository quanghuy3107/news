<?php

namespace App\Http\Controllers\clients;

use App\Features\comments\CreateCommentFeature;
use App\Features\comments\DeleteCommentFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\comments\CreateCommentRequest;
use App\Http\Requests\admins\comments\DeleteCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(
        protected CreateCommentFeature $createCommentFeature,
        protected DeleteCommentFeature $deleteCommentFeature
    )
    {
    }

    public function addComment(CreateCommentRequest $formRequest)
    {
        $dto = $formRequest->getDTO();

        $this->createCommentFeature->setComment($dto);
        $this->createCommentFeature->handle();
        return redirect()->back();
    }

    public function deleteComment(DeleteCommentRequest $formRequest)
    {
        $dto = $formRequest->getDTO();
        $this->deleteCommentFeature->setCommentDTO($dto);
        $this->deleteCommentFeature->handle();
        return redirect()->back();
    }
}
