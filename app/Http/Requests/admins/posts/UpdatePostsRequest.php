<?php

namespace App\Http\Requests\admins\posts;

use App\DTO\PostsDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdatePostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'Title' => 'required|max:255',
            'Image' => 'required',
            'ShortDescription' => 'required',
            'Content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Title.required' => 'Bạn chưa nhập thông tin :attribute.',
            'Title.max' => ':attribute không được quá 255 ký tự.',
            'Image.required' => 'Bạn chưa nhập thông tin :attribute.',
            'ShortDescription.required' => 'Bạn chưa nhập thông tin :attribute.',
            'Content.required' => 'Bạn chưa nhập thông tin :attribute.',
        ];
    }

    public function attributes()
    {
        return [
            'Title' => 'tiêu đề',
            'Image' => 'ảnh',
            'ShortDescription' => 'mô tả ngắn',
            'Content' => 'nội dung',
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
        $this->postsDTO->setTitle($data['Title']);
        $this->postsDTO->setAuthor(1);
        $this->postsDTO->setImage($data['Image']);
        $this->postsDTO->setShortDescription($data['ShortDescription']);
        $this->postsDTO->setContent($data['Content']);
        $this->postsDTO->setUpdateAt(date('Y-m-d H:i:s'));

    }

    public function getDTO() :PostsDTO
    {
        return $this->postsDTO->getDTO();
    }
}
