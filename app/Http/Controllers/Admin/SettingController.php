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
        return view('admin.settings.index');
    }

    public function update(Request $request){
        try{
            $data = $this->validate(request(), [
                'site_logo' =>  'nullable|image|mimes:jpg,png',
                'site_icon' =>  'nullable|image|mimes:jpg,png',
            ]);
            if (request()->hasFile('site_logo') && request('site_logo') != '') {
                $image=$request->file('site_logo');
                $imageName=time(). '.' .$image->extension();
                $image->move(public_path('storage/settings'),$imageName);
                $data['site_logo'] = 'settings/'.$imageName;
            }
            if (request()->hasFile('site_icon') && request('site_icon') != '') {
                $image=$request->file('site_icon');
                $imageName=time(). '.' .$image->extension();
                $image->move(public_path('storage/settings'),$imageName);
                $data['site_icon'] = 'settings/'.$imageName;
            }

            Setting::orderBy('id','desc')->update($data);
            return redirect()->route('settings')->with(['success'=> 'تم تحديث اﻻعدادات بنجاح']);
            } catch(\Exception $ex){
            return redirect()->route('settings')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }
}
