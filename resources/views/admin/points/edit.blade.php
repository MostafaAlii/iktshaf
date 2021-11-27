@extends('admin.layouts.common.master')

@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0"> تعديل نقاط / درجات </h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form action="{{ route('points.update', $point->id) }}"  method="POST" id="create">
                @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!-- Start Code  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">المستوى</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="type_name" class="form-control form-control-lg form-control-solid"  placeholder="ادخل اسم المستوى" value="{{$point->type_name}}"  />
                            @error('type_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>   
                    </div>
                    <!-- End Code -->
                    <!-- Start min point -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">تبدء من</label>
                        <div class="col-lg-8 fv-row">
                            <input class="form-control" type="number" name="min_point" value="{{$point->min_point}}" />
                            @error("min_point")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End min point -->
                    <!-- Start max point -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">تنتهى فى</label>
                        <div class="col-lg-8 fv-row">
                            <input class="form-control" type="number" name="max_point" value="{{$point->max_point}}" />
                            @error("max_point")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End max point -->
                </div>
                <!--End::Card body-->
                <!-- Start Action -->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-warning me-2">تراجع</button>
                    <button type="submit" form="create"  value="Submit" class="btn btn-primary">تحديث</button>
                </div>
                <!-- End Action -->
            </form>
            <!-- End Form -->
        </div>
        <!--End::Content-->
    </div>
    <!--End::Basic info-->
@endsection
