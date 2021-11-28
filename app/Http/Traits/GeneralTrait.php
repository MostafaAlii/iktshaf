<?php
namespace App\Http\Traits;
trait GeneralTrait {
    function savePhoto($request, $file_path){
        $file_extention = $request->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extention;
        $file_path = $file_path;
        $request->move(public_path($file_path), $file_name);  
        return $file_name; 

        /*$image=$request->file('site_logo');
        $imageName=time(). '.' .$image->extension();
        $image->move(public_path('storage/settings'),$imageName);
        $setting->site_logo = 'settings/'.$imageName;*/
    }   
}