<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TapPayment;
class TapPayments extends Controller {

	public function tappayments() {
		return view('admin.tappayments', ['title' => trans('admin.tappayments')]);
	}

	public function tappayments_save() {
		$data = $this->validate( request() , [
		
			'UserName'=>'',
			'Password'=>'',
       		'api_key'=>'',
            'Authorization'=>'', 
        	'currency'=>'',
			'live'=>'',
			'statue'=>'',

		] , [] , [
			'logo' => trans('admin.logo'),

			'icon' => trans('admin.icon'),
		]);

		tappayments()->update($data);

		session()->flash('success', trans('admin.updated_record'));

		return redirect(aurl('tappayments'));

	}

}