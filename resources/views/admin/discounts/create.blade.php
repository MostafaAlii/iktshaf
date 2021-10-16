@extends('admin.layouts.common.master')

@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">اضافة خصم جديد</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form action="{{ route('discounts.store') }}"  method="POST" id="create">
                @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!-- Start Code  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">قيمه الخصم %</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="percentage" class="form-control form-control-lg form-control-solid"  placeholder="ادخل النسبه المئويه للخصم" value="{{old('percentage')}}"  />
                            @error('percentage')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>   
                    </div>
                    <!-- End Code -->
                    <!-- Start Status -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">حاله الخصم</label>
                        <div class="col-lg-8 fv-row">
                            <select name="status" aria-label="أختيار الحاله" data-control="select2" data-placeholder="...اختيار الحاله" class="form-select form-select-solid form-select-lg">
                                <option value="">اختيار الحاله ...</option>
                                <option  value="1">فعال</option>                     
                                <option value="0">غير فعال</option>
                            </select>
                            <!--begin::Hint-->
                            <div class="form-text">برجاء  تحديد حاله الخصم يمكنك الاختيار من فعال او غير فعال.</div>
                            <!--end::Hint-->
                            @error("status")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Status -->
                    <hr>
                    <!-- Start Start at -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">تاريخ البدء</label>
                        <div class="col-lg-8 fv-row">
                            <input id="discount_start_date" name="start_at" class="form-control form-control-lg form-control-solid"  placeholder="ادخل  تاريخ بدء للخصم" value="{{old('start_at')}}"  />
                            @error('start_at')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>   
                    </div>
                    <!-- End Start at -->
                    <!-- Start End at -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">تاريخ اﻻنتهاء</label>
                        <div class="col-lg-8 fv-row">
                            <input id="discount_end_date" name="end_at" class="form-control form-control-lg form-control-solid"  placeholder="ادخل  تاريخ انتهاء للخصم" value="{{old('end_at')}}"  />
                            @error('end_at')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>   
                    </div>
                    <!-- End End at -->
                </div>
                <!--End::Card body-->
                <!-- Start Action -->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-warning me-2">تراجع</button>
                    <button type="submit" form="create"  value="Submit" class="btn btn-primary">حفظ</button>
                </div>
                <!-- End Action -->
            </form>
            <!-- End Form -->
        </div>
        <!--End::Content-->
    </div>
    <!--End::Basic info-->
@endsection
