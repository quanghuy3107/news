<?php

namespace App\Http\Requests;


use App\DTO\password_reset_tokens\CreatePasswordResetTokenDTO;
use App\DTO\UserDTO;
use App\DTO\users\ForgotPasswordUserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class ForgotPasswordRequest extends FormRequest
{
    public function  __construct
    (
        private CreatePasswordResetTokenDTO $createPasswordResetTokenDTO,
        private ForgotPasswordUserDTO $userDTO
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
            'email' => ['required', Rule::exists('users', 'email')],
        ];
    }


    public function after(): array
    {
        return [

            function (Validator $validator) {
                $data = $validator->getData();
                if(!isset($data['email']) or !isset($data['_token'])){
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

    public function setDTO($data) : void
    {
        $this->userDTO->setEmail($data['email']);
        $this->createPasswordResetTokenDTO->setEmail($data['email']);
        $this->createPasswordResetTokenDTO->setToken(time() . rand());
        $this->createPasswordResetTokenDTO->setCreateAt(date('Y-m-d H:i:s'));
    }

    public function getForgotPasswordUserDTO() : ForgotPasswordUserDTO
    {
        return $this->userDTO->getUserDTO();
    }

    public function getPasswordResetTokenDTO() : CreatePasswordResetTokenDTO
    {
        return $this->createPasswordResetTokenDTO->getCreatePasswordResetToken();
    }
}
