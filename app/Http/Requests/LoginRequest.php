<?php

namespace App\Http\Requests;

use App\DTO\PostsDTO;
use App\DTO\UserDTO;
use App\DTO\users\LoginUserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class LoginRequest extends FormRequest
{
    public function __construct(
        protected LoginUserDTO $userDTO
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
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập thông tin :attribute.',
            'password.required' => 'Bạn chưa nhập thông tin :attribute.',

        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'email',
            'password' => 'password',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if(!isset($data['email']) or !isset($data['password'])){
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

    public function setDTO(array $data) : void
    {
        $this->userDTO->setEmail($data['email']);
        $this->userDTO->setPassword($data['password']);

    }

    public function getDTO() :LoginUserDTO
    {
        return $this->userDTO->getUserDTO();
    }
}
