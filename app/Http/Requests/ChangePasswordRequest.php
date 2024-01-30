<?php

namespace App\Http\Requests;

use App\DTO\UserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class ChangePasswordRequest extends FormRequest
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
            'id' => ['required', Rule::exists('users', 'id')],
        ];
    }


    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->count() > 0) {
                    return $this->route('/');
                }


            }
        ];
    }


}
