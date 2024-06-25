<?php

namespace App\Http\Requests;

use App\DTO\UserDTO;
use App\DTO\users\CheckTimeAndTokenDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class ChangePasswordRequest extends FormRequest
{
    public function  __construct(
        protected CheckTimeAndTokenDTO $checkTimeAndTokenDTO
    )
    {

    }
    public function authorize(): bool
    {
        $id = $this->route('id');
        $token = $this->route('token');
        $user = User::find($id);
        if($user !== null or $token !== null){
            return true;
        }else{
            return false;
        }
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
                }else{
                    $id = $this->route('id');
                    $token = $this->route('token');
                    $data['id'] = $id;
                    $data['token'] = $token;
                    $this->setDTO($data);
                }
            }
        ];
    }
    public function setDTO($data): void
    {
        $this->checkTimeAndTokenDTO->setId($data['id']);
        $this->checkTimeAndTokenDTO->setToken($data['token']);
    }

    public function getDTO(): CheckTimeAndTokenDTO
    {
        return $this->checkTimeAndTokenDTO->getCheckTimeAndToken();
    }

}
