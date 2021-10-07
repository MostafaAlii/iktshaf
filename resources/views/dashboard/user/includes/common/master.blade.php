@include('dashboard.user.includes.common._tpl_start')
@include('dashboard.user.includes.common._aside')
@include('dashboard.user.includes.common._header')
@include('dashboard.user.includes.common._activities_drawer')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('dashboard.user.includes.partials._success')
    @include('dashboard.user.includes.partials._errors')
    {{--    @yield('content')--}}
    <center>
        <h1>Welcome User</h1>
    </center>
</div>

@include('dashboard.user.includes.common._footer')
@include('dashboard.user.includes.common._tpl_end')
