@extends('admin.layouts.common.master')

@section('content')
<link rel="stylesheet" href="{{ url ('/assets/admin/jstree/themes/default/style.css')}}">
<script src="{{ url ('/assets/admin/jstree/jstree.js')}}"></script>
<script src="{{ url ('/assets/admin/jstree/jstree.wholerow.js')}}"></script>
<script src="{{ url ('/assets/admin/jstree/jstree.checkbox.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#jstree').jstree({
        "core" : {
            'data' : {!! load_dep(old('parent')) !!},
            "themes" : {
            "variant" : "large"
            }
        },
        "checkbox" : {
            "keep_selected_style" : false
        },
        "plugins" : ["wholerow"]
        });
        $('#jstree').on('changed.jstree',function(e,data){
            var i , j , r = [];
            for (i = 0, j = data.selected.length; i < j;i++){
                r.push(data.instance.get_node(data.selected[i]).id);
            }
            $('.parent_id').val(r.join(', '));
    });
});
    </script>

    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">اضافة قسم جديد</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            {!! Form::open(['url'=>aurl('department'),'files'=>true])!!}
            @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!-- Start Code  -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">أسم القسم</label>
                        <div class="col-lg-8 fv-row">
                        {!! Form::text('dep_name',old('dep_name'),['class'=>'form-control form-control-lg form-control-solid'])!!}
                        </div>   
                    </div>
                    <!-- End Code -->
                    <div class="cleafix"></div>
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">الأقسام</label>
                    <div id="jstree"></div>
                    <input type="hidden" name="parent" class="parent_id" value="{{old('parent')}}">
                    <div class="cleafix"></div>                 
                    <!-- Start Status -->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">الكلمات الدالة</label>
                        <div class="col-lg-8 fv-row">
                            {!! Form::text('keyword',old('keyword'),['class'=>'form-control form-control-lg form-control-solid'])!!}
                            <!--begin::Hint-->
                            <div class="form-text">برجاء  تحديد الكلمات الدالة على القسم لتحسين ال seo.</div>
                            <!--end::Hint-->                           
                        </div>
                    </div>
                    <!-- End Status -->
                </div>
                <!--End::Card body-->
                <!-- Start Action -->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-warning me-2">تراجع</button>
                    <button type="submit" value="Submit" class="btn btn-primary">حفظ</button>
                </div>
                <!-- End Action -->
            </form>
            <!-- End Form -->
        </div>
        <!--End::Content-->
    </div>
    <!--End::Basic info-->
@endsection
