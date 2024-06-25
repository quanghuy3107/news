<?php

namespace App\Http\Controllers\admins;

use App\Features\comments\GetCommentFeature;
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
use App\Http\Requests\clients\comments\FindCommentClientRequest;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    public function __construct(
        protected CreatePostFeature $createPostFeature,
        protected GetPostsFeature $getPostFeature,
        protected FindPostsFeature $findPostsFeature,
        protected UpdatePostsFeature $updatePostsFeature,
        protected DeletePostsFeature $deletePostsFeature,
        protected GetCommentFeature $getCommentFeature
    )
    {

    }
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if(Gate::allows('showPosts')){
        $title = "Trang bài viết";
        $this->getPostFeature->handle();
        $data = $this->getPostFeature->getTransform();
        return view('admins.posts.list', compact('title', 'data'));
        }else{
            abort('403');
        }
    }

    public function detail(FindPostsRequest $formRequest,FindCommentClientRequest $findCommentClientRequest): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $title = "Trang chi tiết";
        $dto = $formRequest->getDTO();
        $this->findPostsFeature->setPostsDTO($dto);
        $this->findPostsFeature->handle();
        $dataPosts = $this->findPostsFeature->getTransform();

        $dtoComment = $findCommentClientRequest->getDTO();
        $this->getCommentFeature->setCommentFeature($dtoComment);
        $this->getCommentFeature->handle();
        $dataComment = $this->getCommentFeature->getTransform();
        return view('admins.posts.detail', compact('title','dataPosts','dataComment'));
    }

    public function addPosts(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if(Gate::allows('createPosts')){
        $title = "Trang thêm bài viết";
        return view('admins.posts.add', compact('title'));
        }else{
            abort('403');
        }
    }

    public function addPostsPost(CreatePostsRequest $formRequest): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('createPosts')){
            $dto = $formRequest->getDTO();
            $this->createPostFeature->setPostDTO($dto);
            $status = $this->createPostFeature->handle();
            if($status){
                return redirect()-> back() ->with ('msg', 'Thêm bài viết thành công.')->with('type', 'success');
            }else{
                return redirect()-> back() ->with ('msg', 'Thêm bài viết thất bại.')->with('type', 'danger');
            }
        }else{
            abort('403');
        }
    }

    public function deletePosts(DeletePostsRequest $formRequest){
        if(Gate::allows('deletePosts')){
            $dto = $formRequest->getDTO();
            $this->deletePostsFeature->setPostsDTO($dto);
            $status = $this->deletePostsFeature->handle();
            if($status){
                return redirect()-> back() ->with ('msg', 'Xóa bài viết thành công.')->with('type', 'success');
            }else{
                return redirect()-> back() ->with ('msg', 'Xóa bài viết thất bại.')->with('type', 'danger');
            }
        }else{
            abort('403');
        }


    }

    public function updatePosts(FindPostsRequest $formRequest): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
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

    public function updatePostsPost(UpdatePostsRequest $formRequest): \Illuminate\Http\RedirectResponse
    {
        if(Gate::allows('createPosts')){
            $dto = $formRequest->getDTO();
            $this->updatePostsFeature->setPostDTO($dto);
            $status = $this->updatePostsFeature->handle();
            if($status){
                return redirect()-> back() ->with ('msg', 'Chỉnh sửa bài viết thành công.')->with('type', 'success');
            }else{
                return redirect()-> back() ->with ('msg', 'Chỉnh sửa bài viết thất bại.')->with('type', 'danger');
            }
        }else{
            abort('403');
        }
    }
}
