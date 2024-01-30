@if(\Illuminate\Support\Facades\Gate::allows('hasRole','ADMIN'))
@include('common.admin.header-base')
@include('common.admin.header')
<div class="container">
    @yield('content')
</div>
@include('common.admin.footer')
@include('common.admin.footer-base')
@else
    bạn khong co quyền
@endif
