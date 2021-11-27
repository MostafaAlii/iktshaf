<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SmsMsegat;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use DateTime;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {
//        return $request;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_num' => ['required', 'unique:users'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_num' => $request->mobile_num,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/choose-avatar');
    }

    public function generateOTP()
    {
        $otp = mt_rand(1000, 9999);
        $time_now = now()->format('Y-m-d H:i:s');
        $otp = ['otp' => $otp, 'time' => $time_now];
        Session::put('otp', $otp);
    }

    public function otpch($otp)
    {
        $sOtp = Session::get('otp');
        if (strtotime(now()->format('Y-m-d H:i:s')) - strtotime($sOtp['time']) < 120) {
            return response([
                'status' => true,
                'message' => 'الكود صحيح'
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'الكود لا يعمل'
            ], 200);
        }
    }

    public function chackreg(Request $request)
    {
        $email = $request->email;
        $phone = $request->phone;
        if (!empty($email) && !empty($phone)) {
            $emailch = User::where('email', $email)->first();
            $phonech = User::where('mobile_num', $phone)->first();
            if (!empty($emailch) || !empty($phonech)) {
                if (!empty($phonech) && !empty($emailch)) {
                    $erro = "رقم الهاتف والبريد الالكترونى مستخدم من قبل";
                } elseif (!empty($phonech)) {
                    $erro = "رقم الهاتف  مستخدم من قبل";
                } elseif (!empty($emailch)) {
                    $erro = "البريد الالكترونى مستخدم من قبل";
                }
                return response([
                    'status' => false,
                    'message' => $erro,
                ], 200);
            } elseif (empty($emailch) && empty($phonech)) {
                $otp_nu = mt_rand(1000, 9999);
                $time_now = now()->format('Y-m-d H:i:s');
                $otp = ['otp' => $otp_nu, 'time' => $time_now];
                Session::put('otp', $otp);
                $sendotp = new SmsMsegat;
                $sendotp->send($phone, $otp_nu);
                return response([
                    'status' => true,
                    'message' => 'لا يوجد تطابق للبيانات'
                ], 200);
            }
        } else {
            if (empty($phone) && empty($email)) {
                $erro = "برجاء ادخال البريد الالكترونى ورقم الجوال";
            } elseif (empty($phone)) {
                $erro = "برجاء ادخال رقم الجوال";
            } elseif (empty($email)) {
                $erro = "برجاء ادخال البريد الالكترونى";
            }
            return response([
                'status' => false,
                'message' => $erro,
            ], 200);
        }
    }

    public function otpse()
    {
        dd($sOtp = Session::get('otp'));
    }
}
