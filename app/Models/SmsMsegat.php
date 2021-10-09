<?php

namespace App\Models;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SmsMsegat
{
	public $user;
	public $kay;
	public $us;
	public $base_url = "https://www.msegat.com/gw/sendsms.php";
	function __construct($user, $kay, $us)
	{
		$this->user=$user;
		$this->kay=$kay;
		$this->us = $us;
	}

	/**
	* @access public
	* @param array, String, String
	* @return true
	**/
	public function send($num, $msg)
	{
		$response = Http::post($base_url,[
			'userName' => $this->user,
            'apiKey' => $this->kay,
            'userSender' => $this->us,
            'numbers' => $num,
            'msg' => $msg
		]);	
		return true;
	}


}
