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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Trang thêm chỉnh sửa bài viết</h5>
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
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Form thêm bài viết</h3>
                </div>
                <!--begin::Form-->
                <form id="myForm" method="POST"  action="{{route('admins.posts.updatePostsPost')}}" enctype="multipart/form-data">

                    <div class="card-body">
                        @error('msg')
                        <div class="row">
                            <div class="alert alert-danger text-center">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                        @if (session('msg'))
                            <div class="row">
                                <div class="alert alert-{{session('type')}} text-center">
                                    {{session('msg')}}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label>
                                        <h4>Tiêu đề bài viết</h4>
                                    </label>
                                    <input type="text" name="Title" class="form-control" value="{{old('Title') ?? $data->Title}}" placeholder="Tiêu đề bài viết" />
                                    @error('Title')
                                    <p style="color: red">{{$message}}</p>

                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                        <h4>Ảnh</h4>
                                    </label>
                                    <input type="file" name="Image" class="form-control" />
                                    @error('Image')
                                    <p style="color: red">{{$message}}</p>

                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                        <h4>Mô tả ngắn</h4>
                                    </label>
                                    <input type="text" name="ShortDescription" class="form-control" value="{{old('ShortDescription') ?? $data->ShortDescription}}" placeholder="Mô tả ngắn" />
                                    @error('ShortDescription')
                                    <p style="color: red">{{$message}}</p>

                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>
                                        <h4>Nội dung bài viết</h4>
                                    </label>
                                    <div id="summernote">{!!old('Content') ?? $data->Content !!}</div>
                                    <input type="hidden" id="content" name="Content">
                                    @error('Content')
                                    <p style="color: red">{{$message}}</p>

                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        @csrf
                        <input type="hidden" value="{{$data->PostsId}}" name="PostsId" />
                        <button type="submit" class="btn btn-primary mr-2">Thay đổi</button>
                        <button type="reset" class="btn btn-secondary">Làm lại</button>
                        <a href="{{route('admins.posts.posts')}}" class="btn btn-default">Quay về</a>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div><!--end::Entry-->

    <style>
        .form-posts .form-group {
            margin-bottom: 10px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Enter content....',
                tabsize: 2,
                height: 200,
                minHeight: 100,
                maxHeight: 300,
                focus: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                    table: [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ],
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']]
                    ]
                },
                codemirror: {
                    theme: 'monokai'
                }
            });

            $('#myForm').submit(function(e) {

                // Lấy nội dung từ Summernote
                var summernoteContent = $('#summernote').summernote('code');
                $('#content').val(summernoteContent);
            });

        });
    </script>

@endsection
