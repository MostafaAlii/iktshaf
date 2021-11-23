<?php
namespace App\Http\Middleware;
use Closure;
use App\Models\Setting;
use Illuminate\Http\Request;
class Maintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /*$allSettingsData = Setting::all();
        $setting['setting'] = $allSettingsData->flatMap(function($allSettingsData) {
            return [$allSettingsData->key => $allSettingsData->value];
        });
        if($setting['site_status'] == '0'){
            return redirect()->route('maintenanceMode');
        } else{*/
            return $next($request);
        //}
    }
}
