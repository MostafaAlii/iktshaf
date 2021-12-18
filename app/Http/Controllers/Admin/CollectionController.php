<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CollectionDataTable;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Test;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(CollectionDataTable $testsDataTable)
    {
        return $testsDataTable->render('admin.collections.index');
    }

    public function create()
    {
        $tests = Test::all();
        return view('admin.collections.create', compact('tests'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'collection' => 'required|max:255',
                'test_id' => 'required|numeric',
            ]);

            $test = Test::findOrFail($request->test_id);

            $collection = new collection();
            $collection->name = $request->collection;
            $collection->mission = $request->mission;
            $collection->specialty = $request->specialty;
            $collection->test_id = $request->test_id;
            $collection->pattern_id = $test->pattern_id;
            $collection->save();

            return redirect()->route('collections.index')->with(['success' => 'تم اضافة الإختبار بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('collections.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }

    }

    public function edit($id)
    {
        $collection = Collection::findOrFail($id);
        $tests = Test::all();

        return view('admin.collections.edit', compact('tests', 'collection'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'collection' => 'required|max:255',
                'test_id' => 'required|numeric',
            ]);

            $test = Test::findOrFail($request->test_id);

            $collection = Collection::findOrFail($request->id);
            $collection->name = $request->collection;
            $collection->mission = $request->mission;
            $collection->specialty = $request->specialty;
            $collection->test_id = $request->test_id;
            $collection->pattern_id = $test->pattern_id;
            $collection->save();

            return redirect()->route('collections.index')->with(['success' => 'تم تعديل الإختبار بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('collections.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function destroy($id)
    {
        Collection::destroy($id);
        return redirect()->route('collections.index')->with(['success' => 'تم حذف الإختبار بنجاح']);
    }
}
