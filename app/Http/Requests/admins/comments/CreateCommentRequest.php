<?php

namespace App\Http\Requests\admins\comments;

use App\DTO\CommentDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CreateCommentRequest extends FormRequest
{
    public function __construct(
        protected CommentDTO $commentDTO
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

    public function messages()
    {
        return [
            'Content.required' => 'Bạn chưa nhập thông tin :attribute.',
        ];
    }

    public function attributes()
    {
        return [
            'Content' => 'nội dung',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if(!Auth::check()){
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

    public function setDTO($data) : void
    {
        if(isset($data['ParentId'])){
            $this->commentDTO->setParentComment($data['ParentId']);
        }
        $this->commentDTO->setPostsId($data['PostsId']);
        $this->commentDTO->setUserId(Auth::user()->id);
        $this->commentDTO->setContent($data['Content']);
        $this->commentDTO->setCreatedAt(date('Y-m-d H:i:s'));
    }

    public function getDTO() : CommentDTO
    {
        return $this->commentDTO;
    }

}
