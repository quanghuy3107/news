<?php

namespace App\Http\Controllers\admins;

use App\Features\users\DeleteUserFeature;
use App\Features\users\GetUserFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\users\DeleteUserRequest;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct(
        protected GetUserFeature $getUserFeature,
        protected DeleteUserFeature $deleteUserFeature
    )
    {
    }

    public function index()
    {
        if(Gate::allows('showUser')){
            $title = "Trang quản lý người dùng";
            $this->getUserFeature->handle();
            $data = $this->getUserFeature->getTransformer();
            return view('admins.users.list', compact('title','data'));
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
        }else{
            abort('403');
        }

    }
}
