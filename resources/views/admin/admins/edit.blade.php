@extends('admin.layouts.common.master')

@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">أنشاء حساب مشرف جديد</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">          
            <form action="{{aurl('admins/update/'.$admin->id)}}"  method="POST" enctype="multipart/form-data" id="create">
                @csrf
                   <!--begin::Card body-->
                   <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">الصورة</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                                <!--begin::Preview existing avatar-->
                                @if (!empty($admin->photo))
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{Storage::url($admin->photo)}})"></div>
                                @else  
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/150-26.jpg)"></div> 
                                @endif
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                 
                   
              <!--begin::Input group-->
              <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">الأسم</label>
                <!--end::Label-->
                <!--begin::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="name" class="form-control form-control-lg form-control-solid"  placeholder="الاسم بالكامل" value="{{ $admin->name }}"  />
                        </div>        
                        <!--end::Col-->                                                  
            </div>
            <!--end::Input group-->
                
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">البريد لاالكترونى</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="email" name="email" class="form-control form-control-lg form-control-solid" placeholder="البريد الالكترونى" value="{{ $admin->email }}" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->                   
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6 required">كلمة المررو</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="كلمة المرور" value="" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->                           
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">الصلاحيات</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <!--begin::Input-->
                            <select name="level" aria-label="أختيار الصلاحية" data-control="select2" data-placeholder="...اختيار الصلاحية" class="form-select form-select-solid form-select-lg">
                                <option value="">اختيار الصلاحية ...</option>                     
                                <option {{ $admin->level == '1' ? "selected" : "" }} value="1">أدارة</option>
                                <option {{ $admin->level == '2' ? "selected" : "" }} value="2">مشرف</option>
                                <option {{ $admin->level == '3' ? "selected" : "" }} value="3">مسوق</option>
                              
                            </select>
                            <!--end::Input-->
                            <!--begin::Hint-->
                            <div class="form-text">برجاء  تحديد وظيفة العضو يمكنك الاختيار من ادارة ومشرف ومسوق.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->  
                     <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">الحالة</label>
                        <div class="col-lg-8 fv-row">

                        <label class="form-check form-check-inline form-check-solid me-5 is-invalid">
                            <input type="hidden" {{ $admin->status == '0' ? "checked " : "" }}  name="status" value="0" class="form-check-input"/>
                            <input type="checkbox" {{ $admin->status == '1' ? "checked " : "" }} name="status" value="1" class="form-check-input"/>
                            <span class="fw-bold ps-2 fs-6">مفعل/غير مفعل</span>
                        </label>
                    </div>  
                </div>  
                <!--end::Input group-->               
                </div>
                <!--end::Card body--> 
                          
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">تراجع</button>
                    <button type="submit" form="create"  value="Submit" class="btn btn-primary">حفظ</button>

                </div>
            <!-- END: Form Layout -->
        </form>


        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
         
@endsection
                    