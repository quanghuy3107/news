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

    public function login(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
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
            }
            else if(Auth::user()->roles()->pluck('role_code')->contains('SUPPERADMIN')){
                return redirect()->route('admins.index');
            }
            else {
//                dd('user');
                return redirect()->route('/');
            }
        }else{
            return redirect() -> route('login') -> with('msg','Đăng nhập thất bại') -> with('type', 'danger');
        }


    }
}
