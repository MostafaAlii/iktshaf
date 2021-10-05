@include('dashboard.admin.includes.common._tpl_start')
@include('dashboard.admin.includes.common._aside')
@include('dashboard.admin.includes.common._header')
@include('dashboard.admin.includes.common._activities_drawer')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('dashboard.admin.includes.partials._success')
    @include('dashboard.admin.includes.partials._errors')
{{--    @yield('content')--}}
    <center>
        <h1>Welcome Admin</h1>
    </center>
</div>

@include('dashboard.admin.includes.common._footer')
@include('dashboard.admin.includes.common._tpl_end')
