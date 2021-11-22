<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(TestsDataTable $testsDataTable){
        return $testsDataTable->render('admin.tests.index');
    }

    public function create()
    {
       return view('admin.tests.create');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'test' => 'required|max:255',
                'pattern' => 'required|in:characters,skills,inclinations',
            ]);

            $test = new Test();
            $test->test = $request->test;
            $test->pattern = $request->pattern;
            $test->save();

            return redirect()->route('tests.index')->with(['success' => 'تم اضافة الإختبار بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('tests.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('admin.tests.edit', compact('test'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'test' => 'required|max:255',
                'pattern' => 'required|in:characters,skills,inclinations',
            ]);

            $test = Test::findOrFail($request->id);
            $test->test = $request->test;
            $test->pattern = $request->pattern;
            $test->save();

            return redirect()->route('tests.index')->with(['success' => 'تم تعديل الإختبار بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('questions.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function destroy($id)
    {
        Test::findOrFail($id)->delete();
        return redirect()->route('tests.index')->with(['success' => 'تم حذف الإختبار بنجاح']);
    }
}
