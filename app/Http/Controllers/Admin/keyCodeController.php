<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CityDataTable;
use App\DataTables\keyCountryDataTable;
use App\DataTables\SchoolDataTable;
use App\Http\Controllers\Controller;
use App\Imports\CityImport;
use App\Imports\CountryImport;
use App\Imports\SchoolImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\City;
use App\Models\Country;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Requests\AttachmentFileKeyCodeRequest;

class keyCodeController extends Controller
{
    //Begin Country Functions
    public function indexCountry(keyCountryDataTable $keyCountryDataTable)
    {
        return $keyCountryDataTable->render('admin.keyCodes.country.index');
    }

    public function createCountry()
    {
        return view('admin.keyCodes.country.create');
    }

    public function storeCountry(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries,name',
            'code' => 'required|string|min:2|max:2|unique:countries,code',
        ]);

        try {
            $country = new Country();
            $country->name = $request->name;
            $country->code = $request->code;
            $country->save();

            return redirect()->route('indexCountry')->with(['success' => 'تم اضافة الدولة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('createCountry')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function editCountry($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.keyCodes.country.edit', compact('country'));
    }

    public function updateCountry(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries,name,' . $request->id,
            'code' => 'required|string|min:2|max:2|unique:countries,code,' . $request->id,
        ]);

        try {
            $country = Country::findOrFail($request->id);
            $country->name = $request->name;
            $country->code = $request->code;
            $country->save();

            return redirect()->route('indexCountry')->with(['success' => 'تم تعديل الدولة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('createCountry')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function deleteCountry($id)
    {
        try {
            $country = Country::findOrFail($id)->delete();
            return redirect()->route('indexCountry')->with(['success' => 'تم حذف الدولة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('createCountry')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function uploadCountry()
    {
        return view('admin.keyCodes.country.upload');
    }

    public function importCountry(AttachmentFileKeyCodeRequest $request)
    {
        try{
            Excel::import(new CountryImport,$request->attachment);
            return redirect()->route('indexCountry')->with(['success'=> 'جارى استخراج الدول من الملف بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('indexCountry')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }

    }
    //End Country Functions

    //Begin City Functions
    public function indexCity(CityDataTable $cityDataTable)
    {
        return $cityDataTable->render('admin.keyCodes.city.index');
    }

    public function createCity()
    {
        $counties = Country::all();
        return view('admin.keyCodes.city.create', compact('counties'));
    }

    public function storeCity(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities,name',
            'code' => 'required|string|min:2|max:2|unique:cities,code',
            'country_id' => 'required',
        ]);

        try {
            $city = new City();
            $city->name = $request->name;
            $city->code = $request->code;
            $city->country_id = $request->country_id;
            $city->save();

            return redirect()->route('indexCity')->with(['success' => 'تم اضافة الدينة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('createCity')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function editCity($id)
    {
        $city = City::findOrFail($id);
        $counties = Country::all();
        return view('admin.keyCodes.city.edit', compact('city', 'counties'));
    }

    public function updateCity(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities,name,' . $request->id,
            'code' => 'required|string|min:2|max:2|unique:cities,code,' . $request->id,
            'country_id' => 'required',
        ]);

        try {
            $city = City::findOrFail($request->id);
            $city->name = $request->name;
            $city->code = $request->code;
            $city->country_id = $request->country_id;
            $city->save();

            return redirect()->route('indexCity')->with(['success' => 'تم تعديل المدينة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('createCity')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function deleteCity($id)
    {
        try {
            $city = City::findOrFail($id)->delete();
            return redirect()->route('indexCity')->with(['success' => 'تم حذف المدينة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('indexCity')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function uploadCity()
    {
        return view('admin.keyCodes.city.upload');
    }

    public function importCity(Request $request)
    {
        try{
            Excel::import(new CityImport,$request->attachment);
            return redirect()->route('indexCity')->with(['success'=> 'جارى استخراج المدن من الملف بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('indexCity')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }

    }
    //End City Functions

    //Begin School Functions
    public function indexSchool(SchoolDataTable $schoolDataTable)
    {
        return $schoolDataTable->render('admin.keyCodes.school.index');
    }

    public function createSchool()
    {
        $cities = City::all();
        return view('admin.keyCodes.school.create', compact('cities'));
    }

    public function storeSchool(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:schools,name',
            'code' => 'required|string|min:2|max:2|unique:schools,code',
            'city_id' => 'required',
        ]);

        try {
            $school = new School();
            $school->name = $request->name;
            $school->code = $request->code;
            $school->city_id = $request->city_id;
            $school->save();

            return redirect()->route('indexSchool')->with(['success' => 'تم اضافة المدرسة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('createSchool')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function editSchool($id)
    {
        $school = School::findOrFail($id);
        $cities = City::all();
        return view('admin.keyCodes.school.edit', compact('school', 'cities'));
    }

    public function updateSchool(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:schools,name,' . $request->id,
            'code' => 'required|string|min:2|max:2|unique:schools,code,' . $request->id,
            'city_id' => 'required',
        ]);

        try {
            $school = School::findOrFail($request->id);
            $school->name = $request->name;
            $school->code = $request->code;
            $school->city_id = $request->city_id;
            $school->save();

            return redirect()->route('indexSchool')->with(['success' => 'تم تعديل المدرسة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('createSchool')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function deleteSchool($id)
    {
        try {
            $school = School::findOrFail($id)->delete();
            return redirect()->route('indexSchool')->with(['success' => 'تم حذف المدرسة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('indexSchool')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function uploadSchool()
    {
        return view('admin.keyCodes.school.upload');
    }

    public function importSchool(AttachmentFileKeyCodeRequest $request)
    {
        try{
            Excel::import(new SchoolImport,$request->attachment);
            return redirect()->route('indexSchool')->with(['success'=> 'جارى استخراج المدارس من الملف بنجاح']);
        } catch(\Exception $ex){
            return redirect()->route('indexSchool')->with(['error'=> 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }

    }
    //End School Functions

}
