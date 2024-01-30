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
                            {!! $dataPosts->Content !!}
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <h3>Bình luận</h3>
                            </div>
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
</style>
@endsection
