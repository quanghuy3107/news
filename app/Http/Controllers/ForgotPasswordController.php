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

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $title = 'Trang lấy lại mật khẩu';
        return view('clients.forgot', compact('title'));
    }

    public function sendMail(ForgotPasswordRequest $formRequest): \Illuminate\Http\RedirectResponse
    {
        $forgotPasswordDto = $formRequest->getForgotPasswordUserDTO();
        $createPasswordResetTokenDto = $formRequest->getPasswordResetTokenDTO();
        $this->checkEmailFeature->setUserDTO($forgotPasswordDto);
        $this->checkEmailFeature->setPasswordResetToken($createPasswordResetTokenDto);
        $this->checkEmailFeature->handle();

        return redirect() -> back() ->with("msg","Hệ thống đã gửi tin nhắn đến mail của quý khách") -> with("type","success");
    }

    public function changePassword($id, $token): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $title = "Trang thay đổi mật khẩu";
        return view('clients.ChangePassword', compact('id','token', 'title'));
    }

    public function changePasswordPost(ChangePasswordPostRequest $formRequest)
    {
        $userDto = $formRequest->getDTO();
        $tokenDTO = $formRequest->getTokenDTO();
        $this->changePasswordFeature->setDataDTO($userDto);
        $this->changePasswordFeature->setTokenDTO($tokenDTO);
        $status = $this->changePasswordFeature->handle();
        if($status){
            return redirect() -> route('login') -> with('msg','Thay đổi mật khẩu thành công') -> with('type', 'success');
        }else{
            return redirect() -> route('login') -> with('msg','Thay đổi mật khẩu thất bại') -> with('type', 'danger');
        }

    }
}
