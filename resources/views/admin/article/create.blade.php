@extends('admin.layouts.common.master')

@section('content')
<style>
.bootstrap-tagsinput {
        width: 100%;
}
.bootstrap-tagsinput .tag {
    background-color: #009ef7;
}

</style>
<link rel="stylesheet" href="{{ url ('/assets/admin/jstree/themes/default/style.css')}}">
<script src="{{ url ('/assets/admin/jstree/jstree.js')}}"></script>
<script src="{{ url ('/assets/admin/jstree/jstree.wholerow.js')}}"></script>
<script src="{{ url ('/assets/admin/jstree/jstree.checkbox.js')}}"></script>
<script src="{{ url ('/assets/admin/tinymce/tinymce.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#jstree').jstree({
        "core" : {
            'data' :  {!! load_dep(old('departeanet_id')) !!},
            "themes" : {
            "variant" : "large"
            }
        },
        "checkbox" : {
            "keep_selected_style" : true
        },
        "plugins" : [ "wholerow", ""]
        });
        $('#jstree').on('changed.jstree',function(e,data){
                var i , j , r = [];
                var name= [];
    
                for (i = 0, j = data.selected.length; i < j;i++){
                    r.push(data.instance.get_node(data.selected[i]).id);
                }
                if(r.join(', ') != ''){
                 $('.departeanet_id').val(r.join(', '));
                }
        });
    });
    </script>
    
 <script type="text/javascript">
     tinymce.init({

         selector: "textarea#elm1",

         theme: "modern",

         skin: "lightgray",

         language: "en",

         width: 600,
         height: 300,

         resize: false,

         menubar: false,
         subfolder: "",
         toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
         // ===========================================
         // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
         // ===========================================
         relative_urls: false,
         image_advtab: true,

         toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime | link unlink anchor | print preview fullpage | save | table | sizeselect | fontsizeselect | styleselect | forecolor backcolor emoticons | cut copy paste | code hr | link image | fullscreen",

         ptoolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime | link unlink anchor | print preview fullpage | save | table | sizeselect | fontsizeselect | styleselect | forecolor backcolor emoticons | cut copy paste | code hr | fullscreen",

         plugins: [
             "advlist autolink lists link image charmap print preview anchor",
             "searchreplace visualblocks code fullscreen",
             "insertdatetime media table contextmenu paste filemanager"
         ],


         content_css: "css/content.css",


         style_formats: [{
                 title: 'Motken Unicode Hor',
                 inline: 'span',
                 styles: {
                     'font-family': 'Motken Unicode Hor'
                 }
             },
             {
                 title: 'Old Antic Bold',
                 inline: 'span',
                 styles: {
                     'font-family': 'Old Antic Bold'
                 }
             },
             {
                 title: 'SC_AMEEN',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_AMEEN'
                 }
             },
             {
                 title: 'SC_DUBAI',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_DUBAI'
                 }
             },
             {
                 title: 'SC_TARABLUS',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_TARABLUS'
                 }
             }
         ]
     });
 </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" >
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

           
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">أنشاء مقالة جديد</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">  
                    
            {!! Form::open(['url'=>aurl('article'),'files'=>true])!!}
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
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/150-26.jpg)"></div>
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
                            <div class="form-text">أنواع الملفات المسموح بها: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                 
                   
              <!--begin::Input group-->
              <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">العنوان</label>
                <!--end::Label-->
                <!--begin::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="title" class="form-control form-control-lg form-control-solid"  placeholder="العنوان" value="{{old('title')}}"  />
                        </div>        
                        <!--end::Col-->                                                  
            </div>
            <!--end::Input group-->
                
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">الوصف</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="description" class="form-control form-control-lg form-control-solid" placeholder="الوصف" value="{{old('description')}}" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->  
                    <hr>
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">الأقسام</label>
                    <input type="hidden" name="department_id" class="departeanet_id" value="{{old('departeanet_id')}}">
                    <div id="jstree"></div>
                    <hr>   
                     <!--begin::Input group-->
                     <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">المحتوى</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <textarea id="elm1" class="form-control form-control-lg form-control-solid" name="content"></textarea>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->                                                          
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">التاج</label>
                        <!--end::Label-->
                         <!--begin::Col-->
                         <div class="col-lg-8 fv-row">
                            <input type="text" name="tags" class="form-control form-control-lg form-control-solid" data-role="tagsinput" placeholder="التاج" value="{{old('tags')}}"  />
                        </div>        
                        <!--end::Col-->  
                        <input type="hidden" name="admin_id"  value="{{admin()->user()->id}}">
                    </div>
                    <!--end::Input group-->                              
                    </div>
                    <!--end::Card body-->                             
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">تراجع</button>
                    <button type="submit"  value="Submit" class="btn btn-primary">حفظ</button>

                </div>
            <!-- END: Form Layout -->
        </form>


        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
         
@endsection
