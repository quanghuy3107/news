<?php

namespace App\Http\Requests\admins\comments;

use App\DTO\CommentDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class GetCommentRequest extends FormRequest
{
    public function __construct(
        protected CommentDTO $commentDTO
    )
    {
    }

    /**
     * Determine if the user is authorized to make this request.
     */
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

    public function setDTO($data) : void
    {
        $this->commentDTO->setPostsId($data['PostsId']);
    }

    public function getDTO() : CommentDTO
    {
        return $this->commentDTO;
    }
}
