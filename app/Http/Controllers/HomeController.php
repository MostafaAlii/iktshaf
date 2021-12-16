<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Setting;
class HomeController extends Controller
{
    public function index() {
        /*$allSettingsData = Setting::all();
        $setting['setting'] = $allSettingsData->flatMap(function($allSettingsData) {
            return [$allSettingsData->key => $allSettingsData->value];
        });*/
        $setting = Setting::orderBy('id','desc')->first();
        return view('welcome',$setting);
    }
    public function getOurServicesPage(){
        return view('user.pages.our-services');
    }

    public function signUpSupervisor(Request $request)
    {
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->bio = $request->bio;
        $admin->mobile_num = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->level = 2;
        $admin->status = '0';
        if (request()->hasFile('photo') && request('photo') != '') {
            $image=$request->file('photo');
            $imageName=time(). '.' .$image->extension();
            //$image->move(public_path('storage/supervisor'),$imageName);
            $image->move(public_path('storage/user'),$imageName);
        //$admin->photo = 'supervisor/'.$imageName;
        $admin->photo = 'user/'.$imageName;
        }
        $admin->save();
        session()->flash('success' , 'تم اضافة الحساب المشرف بنجاح' );
        return redirect('/');
    }

    public function supervisorSignUp()
    {
        return view('user.pages.sign-up-supervisor-form');
    }

}
