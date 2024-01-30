@extends('layouts.client')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="container p-5">

        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="row">
                    {!! $dataPosts->Content !!}
                </div>

                <div class="row">
                    <div class="row">
                        <h3>Ý Kiến</h3>
                    </div>
                    <div class="row comment-new">
                        <p>Mới nhất</p>
                    </div>
                    <div class="row ">
                        <div class="row">
                            <div class="d-flex align-items-center">
                                <p class="name-user"><i class="fa-regular fa-user"></i> Quang huy:</p>
                                <p class="content-comment">Bài viết hữu ích</p>
                            </div>
                        </div>

{{--                        <?php--}}
{{--                        if (!empty($dataComment)) :--}}
{{--                            getComment($dataComment,$dataPosts["posts"]["PostsId"] );--}}
{{--                        endif;--}}
{{--                        ?>--}}
{{--                        <x-comment :postsId="$dataPosts->PostsId"></x-comment>--}}
{{--                        <x-comment :data="$dataComment"></x-comment>--}}


                    </div>
                    @if(Auth::check())
                        <div class="row">
                            <form action="{{route('AddComment')}}" method="POST">
                                <textarea name="Content" id="submit" cols="100%" rows="2" placeholder="Viết bình luận của bạn vào"></textarea>
                                <input type="hidden" name="PostsId" value="{{$dataPosts->PostsId}}">
                                <input type="hidden" name="UserId" value="{{Auth::user()->id}}">

{{--                                    <?php if (!empty($errors['comment'])) : ?>--}}
{{--                                <p style="color:red"><?= $errors['comment'] ?></p>--}}
{{--                                <?php endif; ?>--}}
                                @csrf
                                <button type="submit" class="btn btn-primary" >Gửi</button>
                            </form>
                            <!-- <a href="?controller=login">ds</a> -->
                        </div>
                    @endif




                </div>
                <div class="row">
                    <div class="row sub-side-bar p-4 comment">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2 ">
                            <a href="">
                                <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                            </a>
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                    <div class="row sub-side-bar p-4 comment">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2 ">
                            <a href="">
                                <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                            </a>
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>
                    <div class="row sub-side-bar p-4 comment">
                        <div class="col-md-5 col-sm-12 p-2">
                            <a href="">
                                <img src="{{asset('uploads/5563187178137268204c-houthi-17-8104-5033-1705967087.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-12 p-2 ">
                            <a href="">
                                <p class="text-side-bar">Mỹ, Anh phối hợp không kích Houthi</p>
                            </a>
                            <a href="">
                                <p class="sub-text-side-bar">Mỹ và Anh thông báo phối hợp không kích lực lượng Houthi tại Yemen để đáp trả các vụ tập kích liên tục nhằm vào tàu thuyền trong khu vực. </p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-4 col-lg-12 side-right">
                <div class="row qc">
                    <img src="{{asset('uploads/qc.png')}}" alt="" style="width: 100%;">
                </div>
                <div class="row">
                    <p class="sub-text">Xem nhiều</p>
                </div>
                <div class="row sub-content p-2">
                    <div class="col-4">
                        <img src="{{asset('uploads/xe-khach-1647-1705991327.jpg')}}" alt="">
                    </div>
                    <div class="col-8">
                        <a href="">
                            <p class="text">Xe giường nằm lộn 4 vòng khi lao xuống vực </p>
                        </a>

                    </div>
                </div>
                <div class="row sub-content p-2">
                    <div class="col-4">
                        <img src="{{asset('uploads/xe-khach-1647-1705991327.jpg')}}" alt="">
                    </div>
                    <div class="col-8">
                        <a href="">
                            <p class="text">Xe giường nằm lộn 4 vòng khi lao xuống vực </p>
                        </a>

                    </div>
                </div>
                <div class="row sub-content p-2">
                    <div class="col-4">
                        <img src="{{asset('uploads/xe-khach-1647-1705991327.jpg')}}" alt="">
                    </div>
                    <div class="col-8">
                        <a href="">
                            <p class="text">Xe giường nằm lộn 4 vòng khi lao xuống vực </p>
                        </a>

                    </div>
                </div>
                <div class="row sub-content p-2">
                    <div class="col-4">
                        <img src="{{asset('uploads/xe-khach-1647-1705991327.jpg')}}" alt="">
                    </div>
                    <div class="col-8">
                        <a href="">
                            <p class="text">Xe giường nằm lộn 4 vòng khi lao xuống vực </p>
                        </a>

                    </div>
                </div>
                <div class="row sub-content p-2">
                    <div class="col-4">
                        <img src="{{asset('uploads/xe-khach-1647-1705991327.jpg')}}" alt="">
                    </div>
                    <div class="col-8">
                        <a href="">
                            <p class="text">Xe giường nằm lộn 4 vòng khi lao xuống vực </p>
                        </a>

                    </div>
                </div>
            </div>
        </div>


    </div>

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

        .side-right .sub-text {
            border-bottom: 2px solid red;
        }

        .side-right .text {
            font-weight: 500;
        }

        .sub-content {
            border-bottom: 1px solid #ccc;

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


        @media only screen and (max-width: 1200px) {
            .side-right .qc img {
                display: none;
            }
        }
    </style>
@endsection
