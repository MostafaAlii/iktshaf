@extends('admin.layouts.common.master')

@section('content')
	<!--begin::Tables Widget 9-->
  <div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">الانماط</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                {!! $dataTable->table() !!}

            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
        {!! $dataTable->scripts() !!}
    </div>

    <!--begin::Body-->
</div>
<!--end::Tables Widget 9-->
@endsection
