<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Code;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\TapPayment;

use Illuminate\Support\Facades\Http;

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
    public function visa(){
        $payment=TapPayment::first();
        if($payment->live =='live'){
        $type='sk_live';
        }else{
          $type='sk_test';
        }
          if (request()->ajax()) {    
          $response = Http::withHeaders(['Authorization' => 'Bearer '.$type.'_'.$payment->Authorization])->post('https://api.tap.company/v2/charges',[
              'amount' => 200,
              'currency' => 'SAR',
              'threeDSecure' => true,
              'save_card' => false,
              'description' => 'خدمات أكتشاف',
              'statement_descriptor' => 'Sample',
              'metadata' => 
              [
                'udf1' => '',
                'udf2' => '',
              ],
              'reference' => 
              [
                'transaction' => 1234,
                'order' => 2010,
              ],
              'receipt' => 
              [
                'email' => true,
                'sms' => true,
              ],
              'customer' => 
              [
                'first_name' => 'محمد',
                'middle_name' => 'test',
                'last_name' => 'test',
                'email' => 'ama@ama.com',
                'phone' => [
                  'country_code' => '',
                  'number' => '01124711700',
                ],
              ],
              'merchant' => [
                'id' => '',
              ],
              'source' => [
                'id' => 'src_all',
              ],
              'post' => [
                'url' => '',
              ],
              'redirect' => [
                'url' => url('tappayment'),
              ],          
              ]);
               $tappayment =$response->getBody()->getContents();
               $data=json_decode($tappayment);               
               $url=$data->transaction->url;
               $data=$url;
               $count= [$data] ;
                   return response(['status'=>true,
                      'result' => [$data] ,
                      'count' => count($count),
                  ],200);
              }
          }
  
          public function tappayment(){
            $payment=TapPayment::first();
            if($payment->live =='live'){
            $type='sk_live';
            }else{
              $type='sk_test';
            }
            $charge_id=$_GET['tap_id'];
            $response = Http::withHeaders([
              'Authorization' => 'Bearer '.$type.'_'.$payment->Authorization,
              'charge_id' => $charge_id,
              ])->get('https://api.tap.company/v2/charges/'.$charge_id,[]);
                  $tappayment =$response->getBody()->getContents();
                  $data=json_decode($tappayment);
                  $message2=$data->response->message;//Captured
                  $code2=$data->response->code;//000
                  $message=$data->acquirer->response->message;//Approved
                  $code=$data->acquirer->response->code;//00 
                  if($code == '00' && $message='Approved' && $code2='000' && $message2='Captured'){    
                    $time_now= now()->format('Y-m-d H:i:s');
                    $coderg=['coderg'=>1,'time'=>$time_now];
                    Session::put('coderg', $coderg);
                    return redirect(url('sign-up'));
                  }else{
                    return redirect(url('/'));
                  }
  
            }  
            public function code(){
                return view('user.pages.code');
            }
}
