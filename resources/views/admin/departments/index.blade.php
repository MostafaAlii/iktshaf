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
        'data' :  {!! load_dep() !!},
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
                name.push(data.instance.get_node(data.selected[i]).text);

            }
            $('#form_delete_dep').attr('action','{{ aurl('department') }}/' + r.join(', '));
            $('#deb_name').text(name.join(', '));
            if(r.join(', ') != ''){
                $('.showbtn_control').removeClass('d-none');
                $('.edit_dep').attr('href','{{ aurl('department') }}/' + r.join(', ')+ '/edit');
                $('.delete_dep').attr('href','{{ aurl('department') }}/' + r.join(', ')+ '/delete');
            }else{
                $('.showbtn_control').addClass('d-none');
            }
    });
});

</script>


	<!--begin::Tables Widget 9-->
  <div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">الاقسام</span>
            <span class="text-muted mt-1 fw-bold fs-7">يوجد 500 قسم</span>
        </h3>
        
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
            <!--begin::Table-->
              <a href="{{ aurl('department/create') }}" class="btn btn-info  showbtn_control"><i class="fa fa-edit"></i>أنشاء قسم</a>
              <a href="javascript:void(0);" class="btn btn-success edit_dep showbtn_control d-none"><i class="fa fa-edit"></i>تعديل قسم</a>
              <a href="javascript:void(0);" class="btn btn-danger delete_dep showbtn_control d-none" data-toggle="modal" data-target="#delete_bootstrap_model"><i class="fa fa-trash"></i>حذف قسم</a>            
              <div id="jstree"></div>
            <!--end::Table-->
        <!--end::Table container-->
    </div>

    <!--begin::Body-->
</div>
<!--end::Tables Widget 9-->



@endsection

