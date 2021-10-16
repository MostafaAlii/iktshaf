@extends('admin.layouts.common.master')

@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">تعديل الخصم</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form action="{{ route('discounts.update', $discount->id) }}"  method="POST" id="create">
                @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!-- Start Code  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">قيمه الخصم %</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="percentage" class="form-control form-control-lg form-control-solid" value="{{$discount->percentage}}"  />
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
                                <option {{ $discount->status == '1' ? "selected" : "" }}  value="1">فعال</option>                     
                                <option {{ $discount->status == '0' ? "selected" : "" }} value="0">غير فعال</option>
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
                            <input id="discount_start_date" name="start_at" class="form-control form-control-lg form-control-solid" value="{{$discount->start_at}}"  />
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
                            <input id="discount_end_date" name="end_at" class="form-control form-control-lg form-control-solid"value="{{$discount->end_at}}"  />
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
                    <button type="submit" form="create"  value="Submit" class="btn btn-primary">تحديث</button>
                </div>
                <!-- End Action -->
            </form>
            <!-- End Form -->
        </div>
        <!--End::Content-->
    </div>
    <!--End::Basic info-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ar.min.js" integrity="sha512-rdmfDN1kbYc+OJTJsY9LCoXGUjuXaMwrUwBGdLmGs4g9MwdlgnFdfZPRMlFIOB9xTTyauBfAOV/R4BQDwqxg9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!--end::Javascript-->
		<script type="text/javascript">
			$(function() {
			   $('#discount_start_date').datepicker({
					rtl: true, 
					language: 'ar',
					format: 'yyyy-mm-dd',
			   });
			   $('#discount_end_date').datepicker({
					rtl: true,
					language: 'ar',
					format: 'yyyy-mm-dd',
			   });
			});
		</script>
@endsection
