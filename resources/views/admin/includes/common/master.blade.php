@include('admin.includes.common._tpl_start')
@include('admin.includes.common._aside')
@include('admin.includes.common._header')
@include('admin.includes.common._activities_drawer')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('admin.includes.partials._success')
    @include('admin.includes.partials._errors')
    @yield('content')
</div>

@include('admin.includes.common._footer')
@include('admin.includes.common._tpl_end')