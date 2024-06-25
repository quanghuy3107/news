<?php

namespace App\Http\Requests\admins\posts;

use App\DTO\posts\UpdatePostsDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use League\CommonMark\Extension\DefaultAttributes\DefaultAttributesExtension;

class UpdatePostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function  __construct(private UpdatePostsDTO $postsDTO)
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
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'required',
            'content' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập thông tin :attribute.',
            'title.max' => ':attribute không được quá 255 ký tự.',
            'short_description.required' => 'Bạn chưa nhập thông tin :attribute.',
            'content.required' => 'Bạn chưa nhập thông tin :attribute.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'tiêu đề',
            'image' => 'ảnh',
            'short_description' => 'mô tả ngắn',
            'content' => 'nội dung',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if(!isset($data['posts_id']) or !isset($data['title']) or !isset($data['author']) or !isset($data['short_description']) or !isset($data['content'])){
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

    public function setDTO($data): void
    {
        $this->postsDTO->setPostsId($data['posts_id']);
        $this->postsDTO->setTitle($data['title']);
        $this->postsDTO->setAuthor($data['author']);
        if(isset($data['image'])){
            $this->postsDTO->setImage($data['image']);
        }else{
            $this->postsDTO->setImage((object)NULL);
        }
        $this->postsDTO->setShortDescription($data['short_description']);
        $this->postsDTO->setContent($data['content']);
        $this->postsDTO->setUpdateAt(date('Y-m-d H:i:s'));

    }

    public function getDTO() :UpdatePostsDTO
    {
        return $this->postsDTO->getDTO();
    }
}
