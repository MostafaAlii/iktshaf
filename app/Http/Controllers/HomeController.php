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
    
    public function supervisorSignUp()
    {
        return view('user.pages.sign-up-supervisor-form');
    }

}
