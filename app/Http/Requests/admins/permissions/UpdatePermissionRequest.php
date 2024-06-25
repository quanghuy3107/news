<?php

namespace App\Http\Requests\admins\permissions;

use App\DTO\permissions\UpdatePermissionDTO;
use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdatePermissionRequest extends FormRequest
{
    public function __construct(
        protected UpdatePermissionDTO $updatePermissionDTO
    )
    {
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $id = $this->route('id');
        $permission = Permission::find($id);
        if($permission !== null){
            return true;
        }else{
            return false;
        }
    }

    public function rules(): array
    {

        return [
            'name' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập thông tin :attribute.',
            'name.max' => ':attribute không được quá 255 ký tự.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'quyền',

        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if(!isset($data['name'])){
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
        $this->updatePermissionDTO->setId($data['id']);
        $this->updatePermissionDTO->setName($data['name']);
        $this->updatePermissionDTO->setUpdatedAt(date('Y-m-d H:i:s'));
    }

    public function getDTO(): UpdatePermissionDTO
    {
        return $this->updatePermissionDTO->getUpdatePermissionDTO();
    }
}
