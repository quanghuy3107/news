<?php

namespace App\Http\Requests\admins\users;

use App\DTO\users\CreateUserDTO;
use App\DTO\users\GetIdUserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CheckIdUserRequest extends FormRequest
{

    public function __construct(
        protected GetIdUserDTO $getIdUserDTO
    )
    {
    }

    /**
     * Determine if the user is authorized to make this request.
     */
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
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
                    $id = $this->route('id');
                    $this->setDTO($id);
                }

            }
        ];
    }

    public function setDTO($id): void
    {
        $this->getIdUserDTO->setId($id);
    }

    public function getDTO(): GetIdUserDTO
    {
        return $this->getIdUserDTO->getIdUserDTO();
    }
}
