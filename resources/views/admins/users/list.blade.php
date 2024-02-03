@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Thông tin người dùng</h5>
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
                            <span class="d-block text-muted pt-2 font-size-sm">thông tin các người dùng</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                            <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

                    <!--end: Search Form-->
                    <!--begin: Datatable-->

                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (!empty($data))
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$value->name}} </td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->role_name}}</td>
                                    <td>
                                <span style="overflow: visible; position: relative; width: 125px;" class="d-flex">
                                    @can('deleteUser')
                                    <form action="{{route('admins.users.deleteUser')}}" method="post">
                                        <input type="hidden" value="{{$value->id}}" name="UserId">
                                        @csrf
                                        <button type="submit"
                                                onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này không? ')"
                                                class="btn btn-sm btn-clean btn-icon" title="Delete"> <span
                                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                                   xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                                                   viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                        <path
                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg> </span> </button>
                                    </form>
                                    @endcan
                                </span>
                                    </td>
                                </tr>
                            @endforeach

                        @endif

                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
<!--begin::Subheader-->
