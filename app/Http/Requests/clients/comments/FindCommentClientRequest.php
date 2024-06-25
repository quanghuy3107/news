<?php

namespace App\Http\Requests\clients\comments;


use App\DTO\comments\GetCommentDTO;
use App\DTO\posts\DetailPostsDTO;
use App\Models\CommentModel;
use App\Models\PostsModel;
use Illuminate\Foundation\Http\FormRequest;

class FindCommentClientRequest extends FormRequest
{
    public function __construct(
        protected GetCommentDTO $getCommentDTO
    )
    {
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $postsId = $this->route('id');
        $posts = PostsModel::find($postsId);
        if($posts !== null){
            $dataPosts = $posts->getAttributes();
            $this->setDTO($dataPosts);
            return true;
        }else{
            return false;
        }
    }

    public function setDTO(array $data) : void
    {
        $this->getCommentDTO->setPostsId($data['posts_id']);
    }

    public function getDTO() : GetCommentDTO
    {
        return $this->getCommentDTO->getCommentDTO();
    }

}
