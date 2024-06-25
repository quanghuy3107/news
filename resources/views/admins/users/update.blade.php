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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Trang thêm người dùng</h5>
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
                    <h3 class="card-title">Form thêm người dùng</h3>
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
                                        <h4>Tên người dùng</h4>
                                    </label>
                                    <input type="text" name="name" class="form-control" value="{{old('name') ?? $dataUser->name}}" placeholder="Tên người dùng" />
                                    @error('name')
                                    <p style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" name="email" class="form-control" value="{{old('email') ?? $dataUser->email}}" placeholder="Email" />
                                    @error('email')
                                    <p style="color: red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                        <h4>Vai trò:</h4>
                                    </label>
                                    <select name="role" id="">
                                        @if (!empty($dataRole))
                                            @foreach ($dataRole as $item)
                                                <option value="{{$item->role_id}}" {{((old('role') == $item->role_id or $dataRoleUser->role_id == $item->role_id) ? "selected" : "")}}>{{$item->role_name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>
                                    <h4>Permissions:</h4>
                                </label>
                                @if(!empty($dataPermission))
                                    @foreach($dataPermission as $key=>$value)
                                        <h5>{{$key}}</h5>

                                            @foreach($value as $item)
                                                <input type="checkbox" id="{{$item->permission_id}}" name="permission[]" value="{{$item->permission_id}}"
                                                    @if(!empty($dataPermissionUser))
                                                        @foreach($dataPermissionUser as $permissionUser)
                                                            @if ($permissionUser->permission_id == $item->permission_id)
                                                                checked
                                                             @endif
                                                        @endforeach
                                                    @endif
                                                >
                                                <label for="{{$item->permission_id}}"> {{$item->permission_name}}</label><br>

                                        @endforeach

                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        @csrf
                        <button type="submit" class="btn btn-primary mr-2">Thay đổi</button>
                        <button type="reset" class="btn btn-secondary">Làm lại</button>
                        <a href="{{route('admins.users.user')}}" class="btn btn-default">Quay về</a>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div><!--end::Entry-->

@endsection
