<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render('admin.admins.index');
    }

    public function signUpSupervisor(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->level = 2;
        $admin->status = '0';
        $admin->save();

        return redirect('/');
    }
    public function create()
    {
        return view('admin.admins.create');
    }
    public function store(StoreAdminRequest $request)
    {
     //  dd($request->name);
        $name=$request->name;
        $level=$request->level;
        $email=$request->email;
        $status=$request->status;
        $password=$request->password;
        $admin =new Admin();
        $admin->name = $name;
        $admin->level = $level;
        $admin->email = $email;
        $admin->status = $status;
        $admin->password =  bcrypt($password);
        if (request()->hasFile('photo') && request('photo') != '') {
            $image=$request->file('photo');
            $imageName=time(). '.' .$image->extension();
            $image->move(public_path('storage/admin'),$imageName);
        $admin->photo = 'admin/'.$imageName;
        }
        $admin->save();
        session()->flash('success' , 'تم اضافة الحساب بنجاح' );
        return back();
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admins.edit',['admin'=>$admin]);

    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $name=$request->name;
        $level=$request->level;
        $email=$request->email;
        $status=$request->status;
        $password=$request->password;
        $admin = Admin::find($request->id);        
        $admin->name = $name;
        $admin->level = $level;
        $admin->email = $email;
        $admin->status = $status;
        if(request('password')){
            $admin->password =  bcrypt($password);   
        }else{
           unset($password);            
        }
        if (request()->hasFile('photo') && request('photo') != '') {
            $imagePath = public_path('storage/'.$admin->photo);
            /*if(file_exists($imagePath)){
                unlink($imagePath);
            }*/
            $image=$request->file('photo');
            $imageName=time(). '.' .$image->extension();
            $image->move(public_path('storage/admin'),$imageName);
            $admin->photo = 'admin/'.$imageName;
                    }else{
                        unset($photo);            
                     }
        $admin->save();
        session()->flash('success' , 'تم تحديث بيانات الحساب بنجاح' );
        return back();
    }
    public function delete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        session()->flash('success' , 'تم حذف الحساب بنجاح' );
        return back();
    }
    public function activ($id)
    {
        Admin::where('id',$id)->update(['status'=>'1']);
        session()->flash('success','تم تفعيل الحساب بنجاح');
        return back();
    }
    public function desactiv($id)
    {
        Admin::where('id',$id)->update(['status'=>'0']);
        session()->flash('success','تم تعطيل الحساب بنجاح');
        return back();
    }
}
