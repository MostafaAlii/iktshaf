@extends('admin.layouts.common.master')

@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">اضافة دولة جديد</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form method="POST" action="{{ route('storeCountry') }}" id="create">
                @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!-- Start name  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">إسم الدولة</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="name" class="form-control form-control-lg form-control-solid"  placeholder="ادخل إسم الدولة" value="{{old('name')}}" required/>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End name -->

                    <!-- Start Code  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">كود الدولة</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="code" class="form-control form-control-lg form-control-solid"  placeholder="ادخل كود الدولة" value="{{old('code')}}" minlength="2" maxlength="2" required/>
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Code -->

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
