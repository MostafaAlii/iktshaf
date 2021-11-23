<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller
{ 
    use AttachFilesTrait;
    public function index(){
        $allSettingsData = Setting::all();
        $setting['setting'] = $allSettingsData->flatMap(function($allSettingsData) {
            return [$allSettingsData->key => $allSettingsData->value];
        });
        return view('admin.settings.index', $setting);
    }

    public function update(Request $request){
        try{
                $exceptData = $request->except('_token', '_method', 'site_logo', 'site_icon');
                
                foreach ($exceptData as $key => $value) {
                    Setting::where('key', $key)->update(['value' => $value]);
                }
                // Site Logo img
                if (request()->hasFile('site_logo') && request('site_logo') != ''){
                    $logo_name = $request->file('site_logo')->getClientOriginalName();
                    Setting::where('key', 'site_logo')->update(['value' => $logo_name]);
                    $this->uploadFile($request,'site_logo','siteLogo');
                }
                // Site Icon img
                if (request()->hasFile('site_icon') && request('site_icon') != ''){
                    $logo_name = $request->file('site_icon')->getClientOriginalName();
                    Setting::where('key', 'site_icon')->update(['value' => $logo_name]);
                    $this->uploadFile($request,'site_icon','siteIcon');
                }
                return redirect()->route('settings')->with(['success'=> 'تم تحديث اﻻعدادات بنجاح']);
            } catch(\Exception $ex){
            return redirect()->route('settings')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }
}
