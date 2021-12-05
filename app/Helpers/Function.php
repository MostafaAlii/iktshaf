<?php
//////////// url admin  Helper Function /////
if (! function_exists('aurl')) {
	function aurl($url=''){
		return url('admin/' . trim($url , '/') );
	}
}
//////////// url admin  Helper Function /////
//////////// Setting Helper Function /////
if (! function_exists('setting')) {
	function setting(){
		return \App\Models\Setting::orderBy('id','desc')->first();
	}
}
//////////// Setting Helper Function /////
//////////// datatable lang ar  Helper Function /////
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
//////////// datatable lang ar  Helper Function /////
//////////// Admin Auth date  Helper Function ////
if (! function_exists('admin')) {
	function admin(){
		return auth()->guard('admin');
	}
}
//////////// Admin Auth date  Helper Function /////
//////////// tap payments date Helper Function /////
if (! function_exists('tappayments')) {
	function tappayments(){
		return \App\Models\TapPayment::orderBy('id' , 'desc')->first();
	}
}
//////////// tap payments date  Helper Function /////
//////////// load_department  Helper Function /////
if (! function_exists('load_dep')) {
	function load_dep($select = null , $dep_hide = null){

		$departments = \App\Models\Department::selectRaw('dep_name as text')
				->selectRaw('id as id')
				->selectRaw('parent as parent')
				->get(['text' , 'id' , 'parent']);
		$dep_arr = [];
		foreach ($departments as $department) {
			$list_arr = [];
			$list_arr['icon'] 	 = '';
			$list_arr['li_attr'] = '';
			$list_arr['a_attr']  = '';
			$list_arr['children']= [];
			if ( $select !== null and $select == $department->id ) {
				$list_arr['state']= [
					'opened'  => true,
					'selected' => true,
					'disabled' => false,
				];
			}
			if ( $dep_hide !== null and $dep_hide == $department->id ) {
				$list_arr['state']= [
					'opened'  => false,
					'selected' => false,
					'disabled' => true,
					'hidden' => true,
				];

			}

			$list_arr['id'] = $department->id;
			$list_arr['parent'] = $department->parent == null ? '#' : $department->parent;
			$list_arr['text']   = $department->text;
			array_push($dep_arr , $list_arr );
		}

		return json_encode( $dep_arr , JSON_UNESCAPED_UNICODE);

	}
}
//////////// load_department  Helper Function /////
//////////////  Trim Blog Articale Content Length ///////
if (!function_exists('trim_content')) {
	function trim_content($content, $length){
		$content_array = explode(' ', $content); // convert content to array
        $content = array_splice($content_array,0,$length); // start from content begin and ended in speciefic length
        $content = implode(' ', $content);
        return $content;
	}
}
