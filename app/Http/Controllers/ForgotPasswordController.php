<?php

namespace App\Http\Controllers;

use App\Features\users\ChangePasswordFeature;
use App\Features\users\CheckEmailFeature;
use App\Http\Requests\ChangePasswordPostRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function __construct(
        protected CheckEmailFeature $checkEmailFeature,
        protected ChangePasswordFeature $changePasswordFeature
    )
    {
    }

    public function index()
    {
        $title = 'Trang lấy lại mật khẩu';
        return view('clients.forgot', compact('title'));
    }

    public function sendMail(ForgotPasswordRequest $formRequesr)
    {
        $dto = $formRequesr->getDTO();
        $this->checkEmailFeature->setUserDTO($dto);
        $this->checkEmailFeature->handle();

        return redirect() -> back() ->with("msg","Hệ thống đã gửi tin nhắn đến mail của quý khách") -> with("type","success");
    }

    public function changePassword($id)
    {
        $title = "Trang thay đổi mật khẩu";
        return view('clients.ChangePassword', compact('id', 'title'));
    }

    public function changePasswordPost(ChangePasswordPostRequest $formRequest){
        $dto = $formRequest->getDTO();
        $this->changePasswordFeature->setDataDTO($dto);
        $status = $this->changePasswordFeature->handle();
        if($status){
            return redirect() -> route('login') -> with('msg','Thay đổi mật khẩu thành công') -> with('type', 'success');
        }else{
            return redirect() -> route('login') -> with('msg','Thay đổi mật khẩu thất bại') -> with('type', 'danger');
        }

    }
}
