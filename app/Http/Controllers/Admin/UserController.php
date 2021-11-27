<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UserDataTable;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    public function index(UserDataTable $dataTable){
        return $dataTable->render('admin.users.index');
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(StoreUserRequest $request)
    {
        $name=$request->name;
        $mobile_num=$request->mobile_num;
        $email=$request->email;       
        $password=$request->password;
        $user =new User();
        $user->name = $name;
        $user->mobile_num = $mobile_num;
        $user->email = $email;     
        $user->password =  bcrypt($password);
        if (request()->hasFile('photo') && request('photo') != '') {
            $image=$request->file('photo');
            $imageName=time(). '.' .$image->extension();
            $image->move(public_path('storage/user'),$imageName);
        $user->photo = 'user/'.$imageName;
        }
        $user->save();
        session()->flash('success' , 'تم اضافة الحساب بنجاح' );
        return back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',['user'=>$user]);

    }

    public function update(UpdateUserRequest $request, $id)
    {
        $name=$request->name;
        $mobile_num=$request->mobile_num;
        $email=$request->email;     
        $password=$request->password;
        $user = User::find($request->id);        
        $user->name = $name;
        $user->mobile_num = $mobile_num;
        $user->email = $email;     
        if(request('password')){
            $user->password =  bcrypt($password);   
        }else{
           unset($password);            
        }
        if (request()->hasFile('photo') && request('photo') != '') {
            $imagePath = public_path('storage/'.$user->photo);
            /*if(file_exists($imagePath)){
                unlink($imagePath);
            }*/
            $image=$request->file('photo');
            $imageName=time(). '.' .$image->extension();
            $image->move(public_path('storage/user'),$imageName);
            $user->photo = 'user/'.$imageName;
                    }else{
                        unset($photo);            
                     }
        $user->save();
        session()->flash('success' , 'تم تحديث بيانات الحساب بنجاح' );
        return back();
    }
    public function delete($id)
    {
        $user = User::find($id);
        $imagePath = public_path('storage/'.$user->photo);
        if(file_exists($imagePath)){
            @unlink($imagePath);
        }
        $user = User::find($id);
        $user->delete();
        session()->flash('success' , 'تم حذف الحساب بنجاح' );
        return back();
    }
  
}
