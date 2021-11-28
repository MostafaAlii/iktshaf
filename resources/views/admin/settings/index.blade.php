@extends('admin.layouts.common.master')

@section('content')
	<!--begin::Tables Widget 9-->
  <div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">أاﻻعدادات العامــة</span>
            <span class="text-muted mt-1 fw-bold fs-7"></span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!-- Start Settings Content -->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form action="{{ route('settings.update') }}"  method="post" enctype="multipart/form-data" id="update">
                @csrf
                @method('PUT')
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!-- Start site_name  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">اسم الموقع</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="site_name" class="form-control form-control-lg form-control-solid"  placeholder="ادخل اسم الموقع" value="{{ setting()->site_name }}"/>
                        </div>   
                    </div>
                    <!-- End site_name -->
                    <!-- Start site_name  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">اسم الموقع المختصر</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="site_nickname" class="form-control form-control-lg form-control-solid"  placeholder="ادخل اسم الموقع المختصر" value="{{ setting()->site_nickname }}"/>
                        </div>   
                    </div>
                    <!-- End site_name -->
                    <!-- Start site_email  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">البريد اﻻلكترونى للموقع</label>
                        <div class="col-lg-8 fv-row">
                            <input type="email" name="site_email" class="form-control form-control-lg form-control-solid"  placeholder="ادخل البريد اﻻلكترونى للموقع"value="{{ setting()->site_email }}"/>
                        </div>   
                    </div>
                    <!-- End site_email -->
                    <hr>
                    <!-- Start Site Logo -->
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">شعار الموقع</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                                    <!--begin::Preview existing Site Logo-->
                                    @if (!empty(setting()->site_logo))
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{Storage::url('settings/' .setting()->site_logo)}})"></div>
                                    @else  
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/150-26.jpg)"></div> 
                                    @endif
                                    <!--end::Preview existing Site Logo-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="site_logo" accept=".png, .jpg, .jpeg" />
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
                    </div>
                    <!-- End Site Logo -->
                    <!-- Start Site Icon -->
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">رمز الموقع</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
                                    <!--begin::Preview existing Site Icon-->
                                    @if (!empty(setting()->site_icon))
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ URL::asset('attachments/siteIcon/'.setting()->site_icon) }})"></div>
                                    @else  
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/150-26.jpg)"></div> 
                                    @endif
                                    <!--end::Preview existing Site Icon-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="site_icon" accept=".png, .jpg, .jpeg" />
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
                    </div>
                    <!-- End Site Icon -->
                    <hr>
                    <!-- Start Site Description -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">وصف الموقع</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <textarea id="siteDescription" class="form-control form-control-lg form-control-solid" name="site_description">{{ setting()->site_description }}</textarea>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!-- End Site Description -->
                    <!-- Start Site KeyWords -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">الكلمات الدليلية</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <textarea id="siteKeywords" class="form-control form-control-lg form-control-solid" name="site_keywords">{{ setting()->site_keywords }}</textarea>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!-- End Site KeyWords -->
                    <hr>
                    <!-- Start Like Count -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">عداد اﻻعجابات</label>
                        <div class="col-lg-8 fv-row">
                            <input class="form-control" type="number" name="like_count" value="{{ setting()->like_count }}" />
                            @error("like_count")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End Like Count -->
                    <!-- Start share Count -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">عداد المشاركات</label>
                        <div class="col-lg-8 fv-row">
                            <input class="form-control" type="number" name="share_count" value="{{ setting()->share_count }}" />
                            @error("share_count")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End share Count -->
                    <!-- Start comment Count -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">عداد التعليقات</label>
                        <div class="col-lg-8 fv-row">
                            <input class="form-control" type="number" name="comment_count" value="{{ setting()->comment_count }}" />
                            @error("comment_count")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- End comment Count -->
                    <hr>
                    <!-- Start Facebook Link -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">رابط الفيسبوك</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="facebook_link" class="form-control form-control-lg form-control-solid"  placeholder="ادخل رابط الفيسبوك" value="{{ setting()->facebook_link }}"/>
                        </div>   
                    </div>
                    <!-- End Facebook Link -->
                    <!-- Start Twitter Link -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">رابط تويتر</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="twitter_link" class="form-control form-control-lg form-control-solid"  placeholder="ادخل رابط تويتر" value="{{ setting()->twitter_link }}"/>
                        </div>   
                    </div>
                    <!-- End Twitter Link -->
                    <!-- Start Instgram Link -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">رابط الانستجرام</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="instgram_link" class="form-control form-control-lg form-control-solid"  placeholder="ادخل رابط الانستجرام" value="{{ setting()->instgram_link }}"/>
                        </div>   
                    </div>
                    <!-- End Instgram Link -->
                    <!-- Start WhatsApp Link -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">رابط الواتس اب</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="whatsapp_link" class="form-control form-control-lg form-control-solid"  placeholder="ادخل رابط الواتس اب" value="{{ setting()->whatsapp_link }}"/>
                        </div>   
                    </div>
                    <!-- End WhatsApp Link -->
                    <!-- Start LinkedIn Link -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">رابط لينكد ان</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="linkedIn_link" class="form-control form-control-lg form-control-solid"  placeholder="ادخل رابط لينكد ان" value="{{ setting()->linkedIn_link }}"/>
                        </div>   
                    </div>
                    <!-- End LinkedIn Link -->
                    <hr>
                    <!-- Start Status -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">الحالة</label>
                        <div class="col-lg-8 fv-row">

                        <label class="form-check form-check-inline form-check-solid me-5 is-invalid">
                            <input type="hidden" {{ setting()->site_status == '0' ? "checked " : "" }}  name="site_status" value="0" class="form-check-input"/>
                            <input type="checkbox" {{ setting()->site_status == '1' ? "checked " : "" }} name="site_status" value="1" class="form-check-input"/>
                            <span class="fw-bold ps-2 fs-6">مفعل/غير مفعل</span>
                        </label>
                    </div> 
                    <!-- End Status -->
                    <!-- Start Site Mentannce MSG -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">رسائـل الصيانـة</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <textarea id="siteMaintenanceMsg" class="form-control form-control-lg form-control-solid" name="site_mentanance_msg">{{setting()->site_mentanance_msg}}</textarea>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!-- End Site Mentannce MSG -->
                </div>
                <!--End::Card body-->
                <!-- Start Action -->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-warning me-2">تراجع</button>
                    <button type="submit"  value="Submit" class="btn btn-primary">حفظ</button>
                </div>
                <!-- End Action -->
            </form>
            <!-- End Form -->
        </div>
        <!--End::Content-->
        <!-- End Settings Content -->
    </div>

    <!--begin::Body-->
</div>
<!--end::Tables Widget 9-->
@endsection
