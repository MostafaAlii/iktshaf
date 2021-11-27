<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Storage;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $dep_name=$request->dep_name;
        $keyword=$request->keyword;
        $parent=$request->parent;
        $department =new Department();
        $department->dep_name = $dep_name;
        $department->keyword = $keyword;
        $department->parent = $parent;
        $department->save();         
        session()->flash('success' ,'تم أضافة القسم بنجاح');
        return redirect(aurl('department'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
       
        return view('admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $dep_name=$request->dep_name;
        $keyword=$request->keyword;
        $parent=$request->parent;
        $department = Department::find($id);        
        $department->dep_name = $dep_name;
        $department->keyword = $keyword;
        $department->parent = $parent;
        $department->save();  
        session()->flash('success' ,'تم تعديل بيانات القسم بنجاح');
        return redirect(aurl('department'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public static function delete_department($id)
    {
        $sub_departments = Department::where('parent' , $id)->get();
        foreach ($sub_departments as $sub) {            
            self::delete_department($sub->id);
            $sub->delete();
        }
        $dep = Department::find($id);       
        $dep->delete();
        session()->flash('success' ,'تم حذف القسم بنجاح');
        return redirect(aurl('department'));

    }

   

}
