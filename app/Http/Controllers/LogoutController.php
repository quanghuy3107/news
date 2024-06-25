<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect() -> route('/');
    }
}
