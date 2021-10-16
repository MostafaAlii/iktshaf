<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Discount;
use App\DataTables\DiscountDatatable;
use Illuminate\Support\Facades\DB;
class DiscountController extends Controller
{
    public function index(DiscountDatatable $discountDataTable){
        return $discountDataTable->render('admin.discounts.index');
    }

    public function create(){
        return view('admin.discounts.create');
    }

    public function store(StoreDiscountRequest $request){
        try{
            DB::beginTransaction();
            $percentage=$request->percentage;
            $status=$request->status;
            $start_at=$request->start_at;
            $end_at=$request->end_at;
            $discount =new Discount();
            $discount->percentage = $percentage;
            $discount->status = $status;
            $discount->start_at = $start_at;
            $discount->end_at = $end_at;
            $discount->save();
            DB::commit();
            return redirect()->route('discounts')->with(['success'=> 'تم اضافة الخصم بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('discounts')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }
        
    }

    public function edit($id){
        $discount = Discount::orderBy('id', 'DESC')->find($id);
    
        return view('admin.discounts.edit',['discount'=>$discount]);
    }

    public function update(UpdateDiscountRequest $request, $id){
        try{
            // DB::beginTransaction();
            $discount = Discount::findOrFail($request->id);
        
            $discount->update([
                'status'=>$request->status,
                'percentage'=>$request->percentage,
                'start_at'=>$request->start_at,
                'end_at'=>$request->end_at,
            ]);
            return redirect()->route('discounts')->with(['success'=> 'تم تحديث الخصم بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('discounts')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            // DB::rollback();
        }
    }

    public function delete($id){
        try{
            $discount = Discount::orderBy('id', 'DESC')->find($id);
            $discount->delete();
            return redirect()->route('discounts')->with(['success'=> 'تم حذف بيانات الخصم بنجاح']);
        }catch(\Exception $ex)
        {
            return redirect()->route('discounts')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }
}
