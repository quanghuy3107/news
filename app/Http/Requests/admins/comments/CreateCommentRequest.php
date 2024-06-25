<?php

namespace App\Http\Requests\admins\comments;

use App\DTO\CommentDTO;
use App\DTO\comments\CreateCommentDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CreateCommentRequest extends FormRequest
{
    public function __construct(
        protected CreateCommentDTO $commentDTO
    )
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
//            'UserId' => ['required', Rule::exists('users', 'id')],
            'Content' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'Content.required' => 'Bạn chưa nhập thông tin :attribute.',
        ];
    }

    public function attributes(): array
    {
        return [
            'Content' => 'nội dung',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if(!Auth::check() or !isset($data['PostsId']) or !isset($data['Content'])){
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

    public function setDTO(array $data) : void
    {
        if(isset($data['ParentId'])){
            $this->commentDTO->setParentComment($data['ParentId']);
        }
        $this->commentDTO->setPostsId($data['PostsId']);
        $this->commentDTO->setUserId(Auth::user()->id);
        $this->commentDTO->setContent($data['Content']);
        $this->commentDTO->setCreatedAt(date('Y-m-d H:i:s'));
    }

    public function getDTO() : CreateCommentDTO
    {
        return $this->commentDTO;
    }

}
