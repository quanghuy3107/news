<?php

namespace App\Http\Controllers\clients;

use App\Features\comments\CreateCommentFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\comments\CreateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(
        protected CreateCommentFeature $createCommentFeature
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
}
