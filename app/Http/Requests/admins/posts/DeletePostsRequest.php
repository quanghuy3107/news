<?php

namespace App\Http\Requests\admins\posts;

use App\DTO\posts\DeletePostsDTO;
use App\DTO\PostsDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class DeletePostsRequest extends FormRequest
{

    public function  __construct(private DeletePostsDTO $postsDTO)
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
            'posts_id' => ['required', Rule::exists('posts', 'posts_id')],
        ];
    }


    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if(!isset($data['posts_id'])
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
                    $data = $validator->getData();
                    $this->setDTO($data);
                }

            }
        ];
    }

    public function setDTO(array $data): void
    {
        $this->postsDTO->setPostsId($data['posts_id']);

    }

    public function getDTO() : DeletePostsDTO
    {
        return $this->postsDTO->getDTO();
    }
}
