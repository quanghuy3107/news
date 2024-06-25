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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Trang thêm danh mục quyền</h5>
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
                    <h3 class="card-title">Form thêm danh mục quyền</h3>
                </div>
                <!--begin::Form-->
                <form method="POST" action="" >

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
                                        <h4>Tên danh mục quyền</h4>
                                    </label>
                                    <input type="text" name="code" class="form-control" value="{{old('code')}}" placeholder="Tên danh mục quyền" />
                                    @error('code')
                                    <p style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="card-footer">
                        @csrf
                        <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
                        <button type="reset" class="btn btn-secondary">Làm lại</button>
                        <a href="{{route('admins.permissions.permissions')}}" class="btn btn-default">Quay về</a>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div><!--end::Entry-->

@endsection
