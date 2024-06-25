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

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $title = "Trang chủ";
        $this->getPostsFeature->handle();
        $dataPosts = $this->getPostsFeature->getTransform();
        $firstPost = [];
        if(!empty($dataPosts[0])){
            $firstPost = $dataPosts[0];
        }

        return view('clients.home', compact('title', 'dataPosts','firstPost'));
    }

}
