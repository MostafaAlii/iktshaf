<?php

namespace App\Models;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SmsMsegat
{
	function __construct()
	{
		$this->user='yaser@y2d.com';
		$this->kay='0fc41fceabe77a0d67dd8d921e880827';
		$this->us = 'OTP';
		$this->base_url = 'https://www.msegat.com/gw/sendsms.php';
	}
	
	/**
	* @access public
	* @param array, String, String
	* @return true
	**/
	public function send($num, $otp)
	{		
		$response = Http::post("https://www.msegat.com/gw/sendsms.php",[
			'userName' => $this->user,
            'apiKey' => $this->kay,
            'userSender' => $this->us,
            'numbers' => $num,
            'msg' => 'رمز التحقق:'.$otp.''
		]);	
		return true;
	}


}
