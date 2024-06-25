<?php

namespace App\Http\Controllers\admins;

use App\DTO\users\UpdateUserDTO;
use App\Features\permissions\GetPermissionByUserFeature;
use App\Features\permissions\GetPermissionFeature;
use App\Features\roles\GetRoleByUserFeature;
use App\Features\roles\GetRolesFeature;
use App\Features\users\ChangeStatusUserFeature;
use App\Features\users\CreateUserFeature;
use App\Features\users\DeleteUserFeature;
use App\Features\users\GetUserByIdFeature;
use App\Features\users\GetUserFeature;
use App\Features\users\UpdateUserFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\users\ChangeStatusRequest;
use App\Http\Requests\admins\users\CheckIdUserRequest;
use App\Http\Requests\admins\users\CreateUserRequest;
use App\Http\Requests\admins\users\DeleteUserRequest;
use App\Http\Requests\admins\users\UpdateUserRequest;
use Database\Factories\UserFactory;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    public function __construct(
        protected GetUserFeature $getUserFeature,
        protected DeleteUserFeature $deleteUserFeature,
        protected ChangeStatusUserFeature $changeStatusUserFeature,
        protected GetRolesFeature $getRolesFeature,
        protected GetPermissionFeature $getPermissionFeature,
        protected CreateUserFeature $createUserFeature,
        protected GetRoleByUserFeature $getRoleByUserFeature,
        protected GetUserByIdFeature $getUserByIdFeature,
        protected GetPermissionByUserFeature $getPermissionByUserFeature,
        protected UpdateUserFeature $updateUserFeature
    )
    {
    }

    public function index()
    {
        if(Gate::allows('showUser')){
            $title = "Trang quản lý người dùng";
            $this->getUserFeature->handle();
            $data = $this->getUserFeature->getTransformer();
//            dd($data);
            return view('admins.users.list', compact('title','data'));
        }else{
            abort('403');
        }

    }

    public function changeStatus(ChangeStatusRequest $request): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('changeStatus')){
            $dto = $request->getDTO();
            $this->changeStatusUserFeature->setChangeStatusFeature($dto);
            $status = $this->changeStatusUserFeature->handle();
            if($status){
                return redirect()-> back() ->with ('msg', 'Thay đổi trạng thái người dùng thành công.')->with('type', 'success');
            }else{
                return redirect()-> back() ->with ('msg', 'Thay đổi trạng thái người dùng thất bại.')->with('type', 'danger');
            }
        }else{
            abort('403');
        }
    }

    public function deleteUser(DeleteUserRequest $formRequest)
    {
        if(Gate::allows('deleteUser'))
        {
            $dto = $formRequest->getDTO();
            $this->deleteUserFeature->setUserDTO($dto);
            $status = $this->deleteUserFeature->handle();
            if($status){
                return redirect()-> back() ->with ('msg', 'Xóa người dùng thành công.')->with('type', 'success');
            }else{
                return redirect()-> back() ->with ('msg', 'Xóa người dùng thất bại.')->with('type', 'danger');
            }
        }
        else{
            abort('403');
        }

    }

    public function addUser(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if(Gate::allows('createUser')){
            $title = "Trang thêm người dùng";
            $this->getRolesFeature->handle();
            $dataRole = $this->getRolesFeature->getDataRoleTransformer();

            $this->getPermissionFeature->handle();
            $dataPermission = $this->getPermissionFeature->getTransform();
            return view('admins.users.add', compact('title', 'dataRole', 'dataPermission'));
        }else{
            abort('403');
        }
    }

    public function addUserPost(CreateUserRequest $formRequest): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('createUser')){
            $dto = $formRequest->getDTO();
            $this->createUserFeature->setCreateUserFeature($dto);
            $status = $this->createUserFeature->handle();
            if($status){
                return redirect()->back()->with('msg','Thêm người dùng thành công.')->with('type','success');
            }else{
                return redirect()->back()->with('msg','Thêm người dùng thất bại.')->with('type','danger');
            }
        }else{
            abort('403');
        }
    }

    public function updateUser(CheckIdUserRequest $request)
    {
        if(Gate::allows('updateUser')){
            $title = "Trang update người dùng";

            $dto = $request->getDTO();
            $this->getRoleByUserFeature->setRoleByUserFeature($dto);
            $this->getRoleByUserFeature->handle();
            $dataRoleUser = $this->getRoleByUserFeature->getDataRoleTransformer()[0];

            $this->getUserByIdFeature->setUserByIdFeature($dto);
            $this->getUserByIdFeature->handle();
            $dataUser = $this->getUserByIdFeature->getDataUserTransformer()[0];

            $this->getPermissionByUserFeature->setPermissionByUserFeature($dto);
            $this->getPermissionByUserFeature->handle();
            $dataPermissionUser = $this->getPermissionByUserFeature->getDataPermissionTransformer();

            $this->getRolesFeature->handle();
            $dataRole = $this->getRolesFeature->getDataRoleTransformer();

            $this->getPermissionFeature->handle();
            $dataPermission = $this->getPermissionFeature->getTransform();
            return view('admins.users.update', compact('title', 'dataRole', 'dataPermission','dataRoleUser', 'dataUser', 'dataPermissionUser'));
        }else{
            abort('403');
        }
    }

    public function updateUserPost(UpdateUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('updateUser')){
            $dto = $request->getDTO();
            $this->updateUserFeature->setUpdateUserFeature($dto);
            $status = $this->updateUserFeature->handle();
            if($status){
                return redirect()->back()->with('msg','Thay đổi người dùng thành công.')->with('type','success');
            }else{
                return redirect()->back()->with('msg','Thay đổi người dùng thất bại.')->with('type','danger');
            }
        }else{
            abort('403');
        }
    }
}
