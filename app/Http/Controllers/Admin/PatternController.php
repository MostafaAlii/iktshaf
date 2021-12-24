<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PatternDataTable;
use App\Http\Controllers\Controller;
use App\Models\pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index(PatternDataTable $testsDataTable)
    {
        return $testsDataTable->render('admin.pattern.index');
    }

    public function create()
    {
        return view('admin.pattern.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $pattern = new Pattern();
            $pattern->name = $request->name;
            $pattern->title = $request->title;
            $pattern->about = $request->about;

            if (request()->hasFile('photo') && request('photo') != '') {
                $imagePath = public_path('storage/' . $pattern->photo);
                $image = $request->file('photo');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('storage/pattern'), $imageName);
                $pattern->photo = 'pattern/' . $imageName;
            } else {
                unset($photo);
            }

            if (request()->hasFile('image') && request('image') != '') {
                $imagePath = public_path('storage/' . $pattern->image);
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('storage/pattern'), $imageName);
                $pattern->image = 'pattern/' . $imageName;
            } else {
                unset($image);
            }

            $pattern->save();

            return redirect()->route('Patterns.index')->with(['success' => 'تم إضافة النمط بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('Patterns.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

    public function edit($id)
    {
        $pattern = Pattern::findOrFail($id);
        return view('admin.pattern.edit', compact('pattern'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
            ]);

            $pattern = Pattern::findOrFail($request->id);
            $pattern->name = $request->name;
            $pattern->title = $request->title;
            $pattern->about = $request->about;
            if (request()->hasFile('photo') && request('photo') != '') {
                $imagePath = public_path('storage/' . $pattern->photo);
                $image = $request->file('photo');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('storage/pattern'), $imageName);
                $pattern->photo = 'pattern/' . $imageName;
            } else {
                unset($photo);
            }
            if (request()->hasFile('image') && request('image') != '') {
                $imagePath = public_path('storage/' . $pattern->image);
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('storage/pattern'), $imageName);
                $pattern->image = 'pattern/' . $imageName;
            } else {
                unset($image);
            }
            $pattern->save();

            return redirect()->route('Patterns.index')->with(['success' => 'تم تعديل النمط بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('Patterns.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
        }
    }

}
