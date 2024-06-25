<?php

namespace App\Http\Requests\clients\posts;

use App\DTO\posts\DetailPostsDTO;
use App\Models\PostsModel;
use Illuminate\Foundation\Http\FormRequest;

class FindPostsClientRequest extends FormRequest
{
    public function __construct(
        protected DetailPostsDTO $postsDTO
    )
    {
    }

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function setDTO(array $data) : void
    {
        $this->postsDTO->setPostsId($data['posts_id']);
    }

    public function getDTO() : DetailPostsDTO
    {
        return $this->postsDTO->getDTO();
    }
}
