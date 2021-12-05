<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller
{ 
    use GeneralTrait;
    public function index(){
        $setting = Setting::all();
        return view('admin.settings.index', $setting);
    }

    public function update(Request $request){
        try{
            $request->except('_token', '_method', 'avatar_remove');
            $setting = Setting::find($request->id);
            if (request()->hasFile('site_logo') && request('site_logo') != '') {
                $filename = $this->savePhoto($request->site_logo, 'storage/settings');
             }
            if (request()->hasFile('site_icon') && request('site_icon') != '') {
                $filename = $this->savePhoto($request->site_icon, 'storage/settings/icon');
            }
            Setting::orderBy('id','desc')->update([
            'site_logo' =>  $filename,
            'site_icon' =>  $filename,
            'site_name' =>  $request->site_name,
            'site_nickname' =>  $request->site_nickname,
            'site_email' =>  $request->site_email,
            'site_description' =>  $request->site_description,
            'site_keywords' =>  $request->site_keywords,
            'site_mentanance_msg' =>  $request->site_mentanance_msg,
            'like_count'  =>  $request->like_count,
            'share_count'  =>  $request->share_count,
            'comment_count'  =>  $request->comment_count,
            'facebook_link' =>  $request->facebook_link,
            'twitter_link' =>  $request->twitter_link,
            'instgram_link' =>  $request->instgram_link,
            'whatsapp_link' =>  $request->whatsapp_link,
            'linkedIn_link' =>  $request->linkedIn_link,
            'site_status' =>  $request->site_status,
            ]);
                return redirect()->route('settings')->with(['success'=> 'تم تحديث اﻻعدادات بنجاح']);
            } catch(\Exception $ex){
            return redirect()->route('settings')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    
}
