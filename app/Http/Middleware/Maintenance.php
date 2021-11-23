<?php
namespace App\Http\Middleware;
use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
class Maintenance
{
    public function handle(Request $request, Closure $next)
    {
        $allSettingsData = Setting::all();
        $setting['setting'] = $allSettingsData->flatMap(function($allSettingsData) {
            return [$allSettingsData->key => $allSettingsData->value];
        });
        //dd($setting);
        /*if($setting['site_status'] == '0'){
            return redirect()->route('maintenanceMode');
        } else{*/
            return $next($request);
        //}
    }
}
