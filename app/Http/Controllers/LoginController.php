<?php

namespace App\Http\Controllers;

use App\Features\users\CheckUserFeature;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(
        protected CheckUserFeature $checkUserFeature,
        protected User $user
    )
    {
    }

    public function login()
    {
        $title = 'Trang đăng nhập';
        return view('clients.login',compact('title'));
    }

    public function loginPost(LoginRequest $formRequest)
    {
        $dto = $formRequest->getDTO();
        $this->checkUserFeature->setDTO($dto);
        $status = $this->checkUserFeature->handle();
        if($status){
            if(Auth::user()->roles()->pluck('role_code')->contains('ADMIN')){
                return redirect()->route('admins.index');
//                dd('admin');
            }else
            {
//                dd('user');
                return redirect()->route('/');
            }
        }else{
            return redirect() -> route('login') -> with('msg','Đăng nhập thất bại') -> with('type', 'danger');
        }


    }
}
