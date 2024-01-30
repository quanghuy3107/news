<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Trang chủ trang quản trị";
        return view('admins.home', compact('title'));
    }
}
