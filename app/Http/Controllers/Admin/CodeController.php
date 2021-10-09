<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\StoreCodeRequest;
use App\Http\Requests\UpdateCodeRequest;
use App\Models\Code;
use App\DataTables\CodeDataTable;
use Illuminate\Support\Facades\DB;
class CodeController extends Controller
{
    public function index(CodeDataTable $codeDataTable){
        return $codeDataTable->render('admin.codes.index');
    }

    public function create(){
        return view('admin.codes.create');
    }

    public function store(StoreCodeRequest $request){
        try{
            DB::beginTransaction();
            $codeNum=$request->code;
            $status=$request->status;
            $code =new Code();
            $code->code = $codeNum;
            $code->status = $status;
            $code->save();
            DB::commit();
            return redirect()->route('codes')->with(['success'=> 'تم اضافة الكود بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('codes')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }
        
    }

    public function edit($id){
        $code = Code::orderBy('id', 'DESC')->find($id);
        return view('admin.codes.edit',['code'=>$code]);
    }

    public function update(UpdateCodeRequest $request, $id){
        try{
            DB::beginTransaction();
            $codeNum=$request->code;
            $status=$request->status;
            $code = Code::find($request->id);
            $code->code = $codeNum;
            $code->status = $status;
            $code->save();
            DB::commit();
            return redirect()->route('codes')->with(['success'=> 'تم تحديث الكود بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('codes')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }
    }

    public function delete($id){
        try{
            $code = Code::orderBy('id', 'DESC')->find($id);
            $code->delete();
            return redirect()->route('codes')->with(['success'=> 'تم حذف الكود بنجاح']);
        }catch(\Exception $ex)
        {
            return redirect()->route('codes')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }
}
