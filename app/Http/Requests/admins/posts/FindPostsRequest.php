<?php

namespace App\Http\Requests\admins\posts;

use App\DTO\posts\DetailPostsDTO;
use App\DTO\PostsDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class FindPostsRequest extends FormRequest
{
    public function  __construct(private DetailPostsDTO $postsDTO)
    {

    }
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'PostsId' => ['required', Rule::exists('posts', 'posts_id')],
        ];
    }


    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if(!isset($data['PostsId'])
                ){
                    $validator->errors()->add(
                        'msg',
                        'Vui lòng kiểm tra lại dữ liệu.'
                    ) ;
                }
                if ($validator->errors()->count() > 0) {
                    $validator->errors()->add(
                        'msg',
                        'Vui lòng kiểm tra lại dữ liệu.'
                    );
                }
                else{
                    $this->setDTO($data);
                }

            }
        ];
    }

    public function setDTO(array $data): void
    {
        $this->postsDTO->setPostsId($data['PostsId']);

    }

    public function getDTO() : DetailPostsDTO
    {
        return $this->postsDTO->getDTO();
    }
}
