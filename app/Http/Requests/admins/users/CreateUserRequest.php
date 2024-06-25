<?php

namespace App\Http\Requests\admins\users;

use App\DTO\users\CreateUserDTO;
use App\Enums\TaskSoftDelete;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CreateUserRequest extends FormRequest
{
    public function __construct(
        protected CreateUserDTO $createUserDTO
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
            'name' => 'required|max:255',
            'email' => ['required'],
            'password' => 'required',
            'role' => ['required', Rule::exists('roles', 'role_id')]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập thông tin :attribute.',
            'name.max' => ':attribute không được quá 255 ký tự.',
            'email.required' => 'Bạn chưa nhập thông tin :attribute.',
            'password.required' => 'Bạn chưa nhập thông tin :attribute.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'họ tên',
            'email' => 'email',
            'password' => 'mật khẩu',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if(!isset($data['permission'])){
                    $data['permission'] = [];
                }
                $checkEmail = User::where('email', $data['email'])->where('is_deleted',TaskSoftDelete::NotDeleted)->first();

                if (!empty($checkEmail)) {
                        $validator->errors()->add(
                            'email',
                            'email đã tồn tại trong hệ thống'
                        ) ;
                }
                if(!isset($data['name']) || !isset($data['email']) || !isset($data['password']) || !isset($data['role']) || !isset($data['_token'])){
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
        $this->createUserDTO->setEmail($data['email']);
        $this->createUserDTO->setName($data['name']);
        $this->createUserDTO->setPassword($data['password']);
        $this->createUserDTO->setRole($data['role']);
        $this->createUserDTO->setPermission($data['permission']);
    }

    public function getDTO(): CreateUserDTO
    {
        return $this->createUserDTO->getCreateUserDTO();
    }
}
