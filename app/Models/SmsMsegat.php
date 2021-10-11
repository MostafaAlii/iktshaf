<?php

namespace App\Models;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SmsMsegat
{
	public $base_url = "https://www.msegat.com/gw/sendsms.php";
	function __construct()
	{
		$this->user='yaser@y2d.com';
		$this->kay='0fc41fceabe77a0d67dd8d921e880827';
		$this->us = 'OTP';
	}
	
	/**
	* @access public
	* @param array, String, String
	* @return true
	**/
	public function send($num, $otp)
	{		
		$response = Http::post($base_url,[
			'userName' => $this->user,
            'apiKey' => $this->kay,
            'userSender' => $this->us,
            'numbers' => $num,
            'msg' => 'Pin Code is:'.$otp.''
		]);	
		return true;
	}


}
