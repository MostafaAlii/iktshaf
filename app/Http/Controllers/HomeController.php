<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Setting;
class HomeController extends Controller
{
    public function index() {
        $allSettingsData = Setting::all();
        $setting['setting'] = $allSettingsData->flatMap(function($allSettingsData) {
            return [$allSettingsData->key => $allSettingsData->value];
        });
        return view('welcome', $setting);
    }
}
