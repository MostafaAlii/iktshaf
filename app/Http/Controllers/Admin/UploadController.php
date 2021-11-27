<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class UploadController extends Controller
{
    public function upload($request,$path,$new_name = null) {
        // SetName
        $new_name = $new_name === null ? time() : $new_name;
    }
}
