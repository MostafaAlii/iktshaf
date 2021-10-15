<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Code;
use Illuminate\Support\Facades\Auth;
use Session;

class CodeRgController extends Controller
{
    public function chooseAvatar()
    {
        return view('user.auth.chooseDefaultCharacter');
    }

    public function saveAvatar(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->photo = 'assets/user/assets/images/'. $request->options;
        $user->save();

        return redirect('/');
    }

    public function signup()
    {
        $coderg=Session::get('coderg');
        if(strtotime(now()->format('Y-m-d H:i:s')) -strtotime($coderg['time'])  <60){
            return view('user.pages.signUp');
        }else{
            abort(404);
        }
    }

    public function codeRg($coderg)
    {
        $code=Code::where('code',$coderg)->first();
       if(!empty($code) && $code->status == 1){
        $time_now= now()->format('Y-m-d H:i:s');
        $coderg=['coderg'=>$code->status,'time'=>$time_now];
        Session::put('coderg', $coderg);
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
