<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\NationalityDatatable;
use App\Http\Controllers\Controller;
use App\Models\Nationality;
use App\Http\Requests\StoreNationalitiesRequest;
use App\Http\Requests\UpdateNationalitiesRequest;
//use Illuminate\Http\Request;
class NationalityController extends Controller
{
    public function index(NationalityDatatable $dataTable){
        return $dataTable->render('admin.nationalities.index');
    }

    public function create(){
        return view('admin.nationalities.create');
    }

    public function store(StoreNationalitiesRequest $request){
        try{
            $nationality_name = $request->nationality_name;
            $nationality =new Nationality();
            $nationality->nationality_name = $nationality_name;
            $nationality->save();
            return redirect()->route('nationality.index')->with(['success'=> 'تم اضافة الجنسية بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('nationality.index')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
        
    }

    public function edit($id){
        $nationality = Nationality::orderBy('id', 'DESC')->find($id);
        return view('admin.nationalities.edit',['nationality'=>$nationality]);
    }

    public function update(UpdateNationalitiesRequest $request, $id){
        try{
            $nationality = Nationality::findOrFail($request->id);
            $nationality->update([
                'nationality_name'=>$request->nationality_name
            ]);
            return redirect()->route('nationality.index')->with(['success'=> 'تم تحديث الجنسية بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('nationality.index')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function delete($id){
        try{
            $nationality = Nationality::orderBy('id', 'DESC')->find($id);
            $nationality->delete();
            return redirect()->route('nationality.index')->with(['success'=> 'تم حذف الجنسية بنجاح']);
        }catch(\Exception $ex)
        {
            return redirect()->route('nationality.index')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }
}
