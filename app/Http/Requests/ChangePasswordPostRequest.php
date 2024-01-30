<?php

namespace App\Http\Requests;

use App\DTO\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordPostRequest extends FormRequest
{
    public function __construct(
        protected UserDTO $userDTO
    )
    {
    }

    public function rules(): array
    {
        return [
            // 'oldPassword' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required',
        ];
    }

    public function messages(){
        return [
            // 'oldPassword.required' => 'Bạn chưa nhập :attribute.',
            'password.required' => 'Bạn chưa nhập :attribute.',
            'confirmPassword.required' => 'Bạn chưa nhập :attribute.',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'mật khẩu',
            // 'oldPassword' => 'mật khẩu cũ',
            'confirmPassword' => 'mật khẩu xác nhận'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();

            if($data['password'] != $data['confirmPassword']){
                $validator->errors()->add(
                    'confirmPassword',
                    'mật khẩu xác nhận không khớp'
                ) ;
            }
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add(
                    'msg',
                    'Vui lòng kiểm tra lại dữ liệu.'
                ) ;
            }else{
                $data = $validator->getData();
                $this->setDTO($data);
            }
        });
    }

    public function setDTO($data){
        $this->userDTO->setPassword($data['password']);
        $this->userDTO->setId($data['id']);
    }

    public function getDTO() :UserDTO
    {
        return $this->userDTO->getUserDTO();
    }
}
