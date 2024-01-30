<?php

namespace App\Http\Requests\admins\users;


use App\DTO\UserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class DeleteUserRequest extends FormRequest
{
    public function __construct(
        protected UserDTO $userDTO
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
            'UserId' => ['required', Rule::exists('users', 'id')]
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
        $this->userDTO->setId($data['UserId']);

    }

    public function getDTO() :UserDTO
    {
        return $this->userDTO->getUserDTO();
    }
}
