<?php

namespace App\Http\Requests\admins\users;

use App\DTO\users\UpdateUserDTO;
use App\Enums\TaskSoftDelete;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateUserRequest extends FormRequest
{
    public function __construct(
        protected UpdateUserDTO $updateUserDTO
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

    public function rules(): array
    {

        return [
            'name' => 'required|max:255',
            'email' => ['required', 'email'],
            'role' => ['required', Rule::exists('roles', 'role_id')]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập thông tin :attribute.',
            'name.max' => ':attribute không được quá 255 ký tự.',
            'email.required' => 'Bạn chưa nhập thông tin :attribute.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'họ tên',
            'email' => 'email',
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
                $id = $this->route('id');
                $user = User::where('id', $id)->where('is_deleted',TaskSoftDelete::NotDeleted)->first();
                $checkEmail = User::where('email', $data['email'])->where('is_deleted',TaskSoftDelete::NotDeleted)->first();

                if (!empty($checkEmail)) {
                    if($user->email != $checkEmail->email ){
                        $validator->errors()->add(
                            'email',
                            'email đã tồn tại trong hệ thống'
                        ) ;
                    }

                }
                if(!isset($data['name']) || !isset($data['email']) || !isset($data['role']) || !isset($data['_token'])){
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
                    $id = $this->route('id');
                    $data['id'] = $id;
                    $this->setDTO($data);
                }

            }
        ];
    }

    public function setDTO($data): void
    {
        $this->updateUserDTO->setId($data['id']);
        $this->updateUserDTO->setEmail($data['email']);
        $this->updateUserDTO->setName($data['name']);
        $this->updateUserDTO->setRole($data['role']);
        $this->updateUserDTO->setPermission($data['permission']);
    }

    public function getDTO(): UpdateUserDTO
    {
        return $this->updateUserDTO->getUpdateUserDTO();
    }
}
