<?php

namespace App\Http\Requests\admins\permissions;

use App\DTO\permissions\FindPermissionDTO;
use App\Models\CategoryPermission;
use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class FindPermissionRequest extends FormRequest
{
    public function __construct(
        protected FindPermissionDTO $findPermissionDTO
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
        $this->findPermissionDTO->setId($id);
    }

    public function getDTO(): FindPermissionDTO
    {
        return $this->findPermissionDTO->getFindPermissionDTO();
    }
}
