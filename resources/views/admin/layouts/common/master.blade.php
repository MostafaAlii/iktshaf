@include('admin.layouts.common._tpl_start')
@include('admin.layouts.common._aside')
@include('admin.layouts.common._header')
@include('admin.layouts.common._activities_drawer')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('admin.layouts.partials._success')
    @include('admin.layouts.partials._errors')
    @yield('content')
</div>

@include('admin.layouts.common._footer')
@include('admin.layouts.common._tpl_end')
