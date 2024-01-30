<?php

namespace App\Http\Requests\admins\posts;

use App\DTO\PostsDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class FindPostsRequest extends FormRequest
{
    public function  __construct(private PostsDTO $postsDTO)
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
            'PostsId' => ['required', Rule::exists('Posts', 'PostsId')],
        ];
    }


    public function after(): array
    {
        return [
            function (Validator $validator) {
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

    public function setDTO($data){
        $this->postsDTO->setPostsId($data['PostsId']);

    }

    public function getDTO() :PostsDTO
    {
        return $this->postsDTO->getDTO();
    }
}
