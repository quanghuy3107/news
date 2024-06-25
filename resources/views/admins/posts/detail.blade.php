@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Thông tin bài viết</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Thông tin chung
                            <span class="d-block text-muted pt-2 font-size-sm">thông tin bài viết</span>
                        </h3>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row " style="margin: 50px 0;">
                        <div class="col-8">
                            <div class="row">
                                {!! $dataPosts->content !!}
                            </div>

                            <div class="row">
{{--                                <div class="row">--}}
{{--                                    <h3>Ý Kiến</h3>--}}
{{--                                </div>--}}
                                <div class="row comment-new">
                                    <p>Mới nhất</p>
                                </div>
                                <div class="row ">

                                    @if (!empty($dataComment))
                                        @include('clients.comment', ['data'=>$dataComment, 'postsId'=>$dataPosts->posts_id])
                                    @endif

                                </div>
                                <div class="row">
                                    <form action="{{ route('AddComment') }}" method="POST">
                                        <textarea name="Content" id="submit" cols="100%" rows="2" placeholder="Viết bình luận của bạn vào"></textarea>
                                        <input type="hidden" name="PostsId" value="{{ $dataPosts->posts_id }}">
                                        <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
                                        @error('Content')
                                        <p style="color: red">{{$message}}</p>
                                        @enderror
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </form>
                                    <!-- <a href="?controller=login">ds</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-4">

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
<style>
    img {
        width: 100% !important;
    }

    .title-detail,
    .Normal {
        background-color: white !important;
    }

    .Normal {
        text-align: justify !important;
    }
    .comment-new {
        color: red;
        font-weight: 500;
        font-size: 24px;
        border-bottom: 1px solid #ccc;
    }

    .name-user {
        font-weight: 500;
        font-size: 20px;
    }

    .content-comment {
        font-size: 20px;
    }

    #submit {
        border-left: 2px solid #8B1E44;
        border-radius: 4px;
        background-color: #F7F7F7;
        width: 100%;
    }

    .comment {
        border-bottom: 1px solid #ccc;
    }

    .comment .text-side-bar {
        font-size: 23px;
        font-weight: 500;
    }

    .reply {
        background-color: white;
        border: none;
        color: blue;
    }
</style>
@endsection
