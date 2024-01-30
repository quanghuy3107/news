<?php

namespace App\Http\Controllers\admins;

use App\Features\posts\CreatePostFeature;
use App\Features\posts\DeletePostsFeature;
use App\Features\posts\FindPostsFeature;
use App\Features\posts\GetPostsFeature;
use App\Features\posts\UpdatePostsFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\admins\posts\CreatePostsRequest;
use App\Http\Requests\admins\posts\DeletePostsRequest;
use App\Http\Requests\admins\posts\FindPostsRequest;
use App\Http\Requests\admins\posts\UpdatePostsRequest;

class PostsController extends Controller
{
    public function __construct(
        protected CreatePostFeature $createPostFeature,
        protected GetPostsFeature $getPostFeature,
        protected FindPostsFeature $findPostsFeature,
        protected UpdatePostsFeature $updatePostsFeature,
        protected DeletePostsFeature $deletePostsFeature
    )
    {

    }
    public function index(){
        $title = "Trang bài viết";
        $this->getPostFeature->handle();
        $data = $this->getPostFeature->getTransform();
        return view('admins.posts.list', compact('title', 'data'));
    }

    public function detail(FindPostsRequest $formRequest)
    {
        $title = "Trang chi tiết";
        $dto = $formRequest->getDTO();
        $this->findPostsFeature->setPostsDTO($dto);
        $this->findPostsFeature->handle();
        $dataPosts = $this->findPostsFeature->getTransform();
        return view('admins.posts.detail', compact('title','dataPosts'));
    }

    public function addPosts(){
        $title = "Trang thêm bài viết";
        return view('admins.posts.add', compact('title'));
    }

    public function addPostsPost(CreatePostsRequest $formRequest){
        $dto = $formRequest->getDTO();
        $this->createPostFeature->setPostDTO($dto);
        $status = $this->createPostFeature->handle();
        if($status){
            return redirect()-> back() ->with ('msg', 'Thêm bài viết thành công.')->with('type', 'success');
        }else{
            return redirect()-> back() ->with ('msg', 'Thêm bài viết thất bại.')->with('type', 'danger');
        }
    }

    public function deletePosts(DeletePostsRequest $formRequest){
        $dto = $formRequest->getDTO();
        $this->deletePostsFeature->setPostsDTO($dto);
        $status = $this->deletePostsFeature->handle();
        if($status){
            return redirect()-> back() ->with ('msg', 'Xóa bài viết thành công.')->with('type', 'success');
        }else{
            return redirect()-> back() ->with ('msg', 'Xóa bài viết thất bại.')->with('type', 'danger');
        }

    }

    public function updatePosts(FindPostsRequest $formRequest)
    {
        $title = "Trang update bài viết";
        $dto = $formRequest->getDTO();
        $this->findPostsFeature->setPostsDTO($dto);
        $this->findPostsFeature->handle();
        $data = $this->findPostsFeature->getTransform();
        if(!empty($data)){
            return view('admins.posts.update', compact('title', 'data'));
        }else{
            return redirect()->back()->with('msg', 'Liên kết không thành công');
        }
    }

    public function updatePostsPost(UpdatePostsRequest $formRequest){
        $dto = $formRequest->getDTO();
        $this->updatePostsFeature->setPostDTO($dto);
        $status = $this->updatePostsFeature->handle();
        if($status){
            return redirect()-> back() ->with ('msg', 'Chỉnh sửa bài viết thành công.')->with('type', 'success');
        }else{
            return redirect()-> back() ->with ('msg', 'Chỉnh sửa bài viết thất bại.')->with('type', 'danger');
        }
    }
}
