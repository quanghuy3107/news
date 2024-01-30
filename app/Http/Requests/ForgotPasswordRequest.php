<?php

namespace App\Http\Requests;


use App\DTO\UserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class ForgotPasswordRequest extends FormRequest
{
    public function  __construct(private UserDTO $userDTO)
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
        $this->userDTO->setEmail($data['email']);

    }

    public function getDTO() :UserDTO
    {
        return $this->userDTO->getUserDTO();
    }
}
