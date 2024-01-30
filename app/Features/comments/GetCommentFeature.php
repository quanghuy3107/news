<?php

namespace App\Features\comments;

use App\Actions\comments\GetCommentAction;
use App\DTO\CommentDTO;
use App\services\GetCommentService;
use App\Transformers\CommentTransformer;

class GetCommentFeature
{
    public function __construct(
        protected GetCommentAction $getCommentAction,
        protected CommentTransformer $commentTransformer,
        protected GetCommentService $getCommentService
    )
    {
    }

    private CommentDTO $commentDTO;

    public function setCommentFeature(CommentDTO $commentDTO) : void
    {
        $this->commentDTO = $commentDTO;
    }

    public function getCommentData() : CommentDTO
    {
        return $this->commentDTO;
    }

    public function getTransform()
    {
        return $this->commentTransformer->getDataTransformer();
    }

    public function handle()
    {
        $dataComment =  $this->getCommentAction->handle($this->getCommentData());
        $this->getCommentService->setCommentData($dataComment);
        $dataAllComment = $this->getCommentService->getAllComment();
        $this->commentTransformer->setDataComment($dataAllComment);
    }
}
