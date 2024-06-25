<?php

namespace App\Features\comments;

use App\Actions\comments\GetCommentAction;
use App\DTO\CommentDTO;
use App\DTO\comments\GetCommentDTO;
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

    private GetCommentDTO $commentDTO;

    public function setCommentFeature(GetCommentDTO $commentDTO) : void
    {
        $this->commentDTO = $commentDTO;
    }

    public function getCommentData() : GetCommentDTO
    {
        return $this->commentDTO;
    }

    public function getTransform(): array
    {
        return $this->commentTransformer->getDataTransformer();
    }

    public function handle(): void
    {
        $dataComment =  $this->getCommentAction->handle($this->getCommentData());
        $this->getCommentService->setCommentData($dataComment);
        $dataAllComment = $this->getCommentService->getAllComment();
        $this->commentTransformer->setDataComment($dataAllComment);
    }
}
