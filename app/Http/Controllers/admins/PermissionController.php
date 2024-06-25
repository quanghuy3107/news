<?php

namespace App\Http\Controllers\admins;

use App\Features\categories_permission\CreateCategoryPermissionFeature;
use App\Features\categories_permission\GetCategoriesPermissionFeature;
use App\Features\permissions\CreatePermissionFeature;
use App\Features\permissions\DeletePermissionFeature;
use App\Features\permissions\FindPermissionFeature;
use App\Features\permissions\GetPermissionFeature;
use App\Features\permissions\UpdatePermissionFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\cateries_permission\CreateCategoryPermissionRequest;
use App\Http\Requests\admins\permissions\CreatePermissionRequest;
use App\Http\Requests\admins\permissions\DeletePermissionRequest;
use App\Http\Requests\admins\permissions\FindPermissionRequest;
use App\Http\Requests\admins\permissions\UpdatePermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public function __construct(
        protected GetPermissionFeature $permissionFeature,
        protected CreateCategoryPermissionFeature $createCategoryPermissionFeature,
        protected GetCategoriesPermissionFeature $getCategoriesPermissionFeature,
        protected CreatePermissionFeature $createPermissionFeature,
        protected DeletePermissionFeature $deletePermissionFeature,
        protected FindPermissionFeature $findPermissionFeature,
        protected UpdatePermissionFeature $updatePermissionFeature
    )
    {
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if(Gate::allows('showPermission')){
        $title = "Trang danh sách quyền";
        $this->permissionFeature->handle();
        $data = $this->permissionFeature->getTransform();

        $this->getCategoriesPermissionFeature->handle();
        $dataCategoriesPermission = $this->getCategoriesPermissionFeature->getCategoryPermissionFeature();
        return view('admins.permissions.list', compact('title','data','dataCategoriesPermission'));
        }else{
            abort('403');
        }
    }

    public function addPermission(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if(Gate::allows('createPermission')){
        $title = "Trang thêm quyền";
        return view('admins.permissions.addPermission', compact('title'));
        }else{
            abort('403');
        }
    }

    public function addCategoryPermission(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if(Gate::allows('createCategoryPermission')){
        $title = "Trang thêm danh mục quyền";
        return view('admins.permissions.addCategoryPermission', compact('title'));
        }else{
            abort('403');
        }
    }

    public function addCategoryPermissionPost(CreateCategoryPermissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('createCategoryPermission')){
            $dto = $request->getDTO();
            $this->createCategoryPermissionFeature->setCreateCategoryPermissionFeature($dto);
            $status = $this->createCategoryPermissionFeature->handle();
            if($status){
                return redirect()->back()->with('msg','Thêm danh mục quyền thành công.')->with('type','success');
            }else{
                return redirect()->back()->with('msg','Thêm danh mục quyền thất bại.')->with('type','danger');
            }
        }else{
            abort('403');
        }
    }

    public function addPermissionPost(CreatePermissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('createPermission')){
            $dto = $request->getDTO();
            $this->createPermissionFeature->setPermissionFeature($dto);
            $status = $this->createPermissionFeature->handle();
            if($status){
                return redirect()->back()->with('msg','Thêm quyền thành công.')->with('type','success');
            }else{
                return redirect()->back()->with('msg','Thêm quyền thất bại.')->with('type','danger');
            }
        }else{
            abort('403');
        }
    }

    public function deletedPermission(DeletePermissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('deletePermission')){
            $dto = $request->getDTO();
            $this->deletePermissionFeature->setDeletePermissionFeature($dto);
            $status = $this->deletePermissionFeature->handle();
            if($status){
                return redirect()->back()->with('msg','Xóa thành công.')->with('type','success');
            }else{
                return redirect()->back()->with('msg','Xóa thất bại.')->with('type','danger');
            }
        }else{
            abort('403');
        }
    }

    public function updatePermission(FindPermissionRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if(Gate::allows('updatePermission')){
            $title = "Trang chỉnh sửa quyền";
            $dto = $request->getDTO();
            $this->findPermissionFeature->setFindPermissionFeature($dto);
            $data = $this->findPermissionFeature->handle();
            return view('admins.permissions.updatePermission', compact('title', 'data'));
        }else{
            abort('403');
        }
    }

    public function updatePermissionPost(UpdatePermissionRequest $request): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('updatePermission')){
            $dto = $request->getDTO();
            $this->updatePermissionFeature->setUpdatePermissionFeature($dto);
            $status = $this->updatePermissionFeature->handle();
            if($status){
                return redirect()->back()->with('msg','Chỉnh sửa thành công.')->with('type','success');
            }else{
                return redirect()->back()->with('msg','Chỉnh sửa thất bại.')->with('type','danger');
            }
        }else{
            abort('403');
        }
    }
}
