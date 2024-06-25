<?php

namespace App\Http\Requests;

use App\DTO\password_reset_tokens\CreatePasswordResetTokenDTO;
use App\DTO\password_reset_tokens\FindTokenDTO;
use App\DTO\UserDTO;
use App\DTO\users\ChangePasswordUserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordPostRequest extends FormRequest
{
    public function __construct(
        protected ChangePasswordUserDTO $userDTO,
        protected FindTokenDTO $findTokenDTO
    )
    {
    }

    public function authorize(): bool
    {
        $id = $this->route('id');
        $user = User::find($id);

        if($user !== null){
            return true;
        }else{
            return false;
        }
    }

    public function rules(): array
    {
        return [
            // 'oldPassword' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            // 'oldPassword.required' => 'Bạn chưa nhập :attribute.',
            'password.required' => 'Bạn chưa nhập :attribute.',
            'confirmPassword.required' => 'Bạn chưa nhập :attribute.',
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => 'mật khẩu',
            // 'oldPassword' => 'mật khẩu cũ',
            'confirmPassword' => 'mật khẩu xác nhận'
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            if(!isset($data['password']) or !isset($data['confirmPassword'])){
                $validator->errors()->add(
                    'msg',
                    'Vui lòng kiểm tra lại dữ liệu.'
                ) ;
            }
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
                $id = $this->route('id');

                $data = $validator->getData();
                $data['id'] = $id;
                $this->setDTO($data);
            }
        });
    }

    public function setDTO($data): void
    {
        $this->userDTO->setPassword($data['password']);
        $this->userDTO->setId($data['id']);
        $this->findTokenDTO->setToken($this->route('token'));
    }

    public function getDTO() :ChangePasswordUserDTO
    {
        return $this->userDTO->getUserDTO();
    }

    public function getTokenDTO() : FindTokenDTO
    {
        return $this->findTokenDTO->getFindToken();
    }
}
