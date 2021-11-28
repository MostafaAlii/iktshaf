<?php
namespace App\Http\Traits;
trait GeneralTrait {
    function savePhoto($request, $file_path){
        $file_extention = $request->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extention;
        $file_path = $file_path;
        $request->move(public_path($file_path), $file_name);  
        return $file_name; 
    }   
}