<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\PointDatatable;
use App\Http\Controllers\Controller;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PointController extends Controller {
    public function index(PointDataTable $pointDataTable){
        return $pointDataTable->render('admin.points.index');
    }

    public function create(){
        return view('admin.points.create');
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $type_name=$request->type_name;
            $min_point=$request->min_point;
            $max_point=$request->max_point;
            $point =new Point();
            $point->type_name = $type_name;
            $point->min_point = $min_point;
            $point->max_point = $max_point;
            $point->save();
            DB::commit();
            return redirect()->route('points')->with(['success'=> 'تم اضافة المستوى و النقاط بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('points')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }

    }

    public function edit($id) {
        $point = Point::orderBy('id', 'DESC')->find($id);
        return view('admin.points.edit',['point'=>$point]);
    }

    public function update(Request $request, $id){
        try{
            // DB::beginTransaction();
            $point = Point::findOrFail($request->id);
        
            $point->update([
                'type_name'=>$request->type_name,
                'min_point'=>$request->min_point,
                'max_point'=>$request->max_point,
            ]);
            return redirect()->route('points')->with(['success'=> 'تم تحديث المستوى و النقاط بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('points')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            // DB::rollback();
        }
    }

    public function delete($id){
        try{
            $point = Point::orderBy('id', 'DESC')->find($id);
            $point->delete();
            return redirect()->route('points')->with(['success'=> 'تم حذف المستوى و النقاط بنجاح']);
        }catch(\Exception $ex)
        {
            return redirect()->route('discounts')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }
}
