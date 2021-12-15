@extends('admin.layouts.common.master')

@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
             data-bs-target="#kt_account_profile_details" aria-expanded="true"
             aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">اضافة إختبار جديد</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form action="{{ route('tests.store') }}" method="POST" id="create">
            @csrf
            <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الإختبار</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="test" class="form-control form-control-lg form-control-solid"
                                   placeholder="ادخل الإختبار" value="{{old('test')}}" required/>
                            @error('test')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">درجة النجاح</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="passing" class="form-control form-control-lg form-control-solid"
                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                   placeholder="درجة النجاح" value="{{old('passing')}}" required/>
                            @error('passing')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">نمط الإختبار</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a Team Member" name="pattern" required>
                                <option disabled selected>اختر من القائمة</option>
                                @foreach($patterns as $pattern)
                                    <option value="{{$pattern->id}}">{{$pattern->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!--End::Card body-->
                <!-- Start Action -->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-warning me-2">تراجع</button>
                    <button type="submit" form="create" value="Submit" class="btn btn-primary">حفظ</button>
                </div>
                <!-- End Action -->
            </form>
            <!-- End Form -->
        </div>
        <!--End::Content-->
    </div>
    <!--End::Basic info-->
@endsection

@section('js')
@stop
