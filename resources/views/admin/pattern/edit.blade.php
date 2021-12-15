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
                <h3 class="fw-bolder m-0"> تعديل نمط >> {{$pattern->name}} </h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form action="{{ route('Patterns.update', 'test')}}" method="POST" id="create">
                @csrf
                @method('PATCH')

                <input type="hidden" name="id" value="{{$pattern->id}}" required/>

                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">النمط</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="pattern" class="form-control form-control-lg form-control-solid"
                                   placeholder="ادخل النمط" value="{{$pattern->name}}" required/>
                            @error('pattern')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
