@extends('admin.layouts.common.master')

@section('content')
	<!--begin::Tables Widget 9-->
  <div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">الاسئلة</span>
        </h3>
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="اضافة جنسية جديدة">
            <a href="{{ route('questions.create') }}" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->أضافة سؤال جديد</a>
        </div>
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
