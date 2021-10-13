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