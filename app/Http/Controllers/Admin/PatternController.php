<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PatternDataTable;
use App\Http\Controllers\Controller;
use App\Models\pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index(PatternDataTable $testsDataTable){
        return $testsDataTable->render('admin.pattern.index');
    }

    public function edit($id)
    {
        $pattern = pattern::findOrFail($id);
        return view('admin.pattern.edit', compact('pattern'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'pattern' => 'required|max:255',
            ]);

            $pattern = Pattern::findOrFail($request->id);
            $pattern->name = $request->pattern;
            $pattern->save();

            return redirect()->route('Patterns.index')->with(['success' => 'تم تعديل الإختبار بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('Patterns.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }
}
