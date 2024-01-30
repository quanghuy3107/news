<?php

namespace App\Http\Controllers\clients;

use App\Features\posts\GetPostsFeature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeClientController extends Controller
{
    public function __construct(
        protected GetPostsFeature $getPostsFeature
    )
    {
    }

    public function index()
    {
        $title = "Trang chủ";
        $this->getPostsFeature->handle();
        $dataPosts = $this->getPostsFeature->getTransform();
        return view('clients.home', compact('title', 'dataPosts'));
    }

}
