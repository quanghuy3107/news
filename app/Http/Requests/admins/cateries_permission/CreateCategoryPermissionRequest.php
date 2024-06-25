<?php

namespace App\Http\Requests\admins\cateries_permission;

use App\DTO\categories_permission\CreateCategoryPermissionDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CreateCategoryPermissionRequest extends FormRequest
{
    public function __construct(
        protected CreateCategoryPermissionDTO $createCategoryPermissionDTO
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

    public function rules(): array
    {

        return [
            'code' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Bạn chưa nhập thông tin :attribute.',
            'code.max' => ':attribute không được quá 255 ký tự.',
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => 'danh mục quyền',

        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if(!isset($data['code'])){
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
        $this->createCategoryPermissionDTO->setCode($data['code']);
        $this->createCategoryPermissionDTO->setCreatedAt(date('Y-m-d H:i:s'));
    }

    public function getDTO(): CreateCategoryPermissionDTO
    {
        return $this->createCategoryPermissionDTO->getCreateCategoryPermissionDTO();
    }
}
