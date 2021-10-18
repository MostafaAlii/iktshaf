<?php

if (! function_exists('aurl')) {
	function aurl($url=''){
		
		return url('admin/' . trim($url , '/') );

	}
}
if (! function_exists('datatable_lang')) {
	function datatable_lang(){
		
		return [
			
                "sProcessing" => trans('datetable.sProcessing'),
                "sLengthMenu" => trans('datetable.sLengthMenu'),
                "sZeroRecords" => trans('datetable.sZeroRecords'),
                "sEmptyTable" => trans('datetable.sEmptyTable'),
                "sInfo" => trans('datetable.sInfo'),
                "sInfoEmpty" => trans('datetable.sInfoEmpty'),
                "sInfoFiltered" => trans('datetable.sInfoFiltered'),
                "sInfoPostFix" => trans('datetable.sInfoPostFix'),
                "sSearch" => trans('datetable.sSearch'),
                "sUrl" => trans('datetable.sUrl'),
                "sInfoThousands" => trans('datetable.sInfoThousands'),
                "sLoadingRecords" =>trans('datetable.sLoadingRecords'),
                "oPaginate" => [
                    "sFirst" => trans('datetable.sFirst'),
                    "sLast" => trans('datetable.sLast'),
                    "sNext" => trans('datetable.sNext'),
                    "sPrevious" => trans('datetable.sPrevious'),
                ],
                "oAria" => [
                    "sSortAscending" => trans('datetable.sSortAscending'),
                    "sSortDescending" => trans('datetable.sSortDescending'),
                ],
		];
	}
}
if (! function_exists('admin')) {
	function admin(){
		return auth()->guard('admin');
	}
}

if (! function_exists('tappayments')) {
	function tappayments(){		
		return \App\Models\TapPayment::orderBy('id' , 'desc')->first();
	}
}
//////////// Validate Helper Function /////
if(!function_exists('v_image')){
    function v_image($ext = null){
        if($ext === null){
            return 'image|mimes:jpeg,jpg,png,gif,bmp';
        }else{
            return 'image|mimes:'.$ext;
        }
    }
}

if(!function_exists('up')){
    function up(){
        return new \App\Http\Controllers\Upload ;

    }
}

//////////////  Trim Blog Articale Content Length ///////
if (!function_exists('trim_content')) {
	function trim_content($content, $length){
		$content_array = explode(' ', $content); // convert content to array
        $content = array_splice($content_array,0,$length); // start from content begin and ended in speciefic length
        $content = implode(' ', $content);
        return $content;
	}
}