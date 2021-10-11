<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Code;

class CodeRgController extends Controller
{
    public function codeRg($coderg)
    {
        $code=Code::where('code',$coderg)->first();
       if(!empty($code) && $code->status == 1){
        return response([
            'status'=>true,
            'url'=>"/sign-up",
            'message' =>'الكود يعمل بنجاح'
        ],200);
       }else{
        return response([
            'status'=>false,
        ],400);
       }
      
    }
}
