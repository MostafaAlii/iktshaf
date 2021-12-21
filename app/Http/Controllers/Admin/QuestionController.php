<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\QuestionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\collection;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(QuestionsDataTable $dataTable)
    {
        return $dataTable->render('admin.questions.index');
    }

    public function create()
    {
        $tests = Test::all();
        return view('admin.questions.create', compact('tests'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'question' => 'required|max:255',
                'test' => 'required',
                'collection' => 'required',
                'answers' => 'required|max:255',
                'degrees' => 'required|max:255',
            ]);

            DB::beginTransaction();

            $test = Test::findOrFail($request->test);

            $question = new Question();
            $question->question = $request->question;
            $question->collection_id = implode(',', $request->collection);
            $question->test_id = $request->test;
            $question->pattern_id = $test->pattern_id;
            $question->save();

            foreach ($request->answers as $index => $answer) {
                $a = new Answer();
                $a->answer = $answer;
                $a->degree = $request->degrees[$index];
                $a->emoji = $request->emoji[$index];
                $a->question_id = $question->id;
                $a->save();
            }

            DB::commit();

            return redirect()->route('questions.index')->with(['success' => 'تم اضافة السؤال بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('questions.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $question = Question::with('answers')->findOrFail($id);
        $collections = collection::where('test_id', $question->test_id)->select('id', 'name')->get();
        $tests = Test::all();
        return view('admin.questions.edit', compact('question', 'tests', 'collections'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'question' => 'required|max:255',
                'test' => 'required',
                'collection' => 'required',
                'answers' => 'required|max:255',
                'degrees' => 'required|max:255',
            ]);

            DB::beginTransaction();

            $test = Test::findOrFail($request->test);

            $question = Question::findOrFail($request->id);
            $question->question = $request->question;
            $question->collection_id = implode(',', $request->collection);
            $question->test_id = $request->test;
            $question->pattern_id = $test->pattern_id;
            $question->save();

            Answer::where('question_id', $request->id)->delete();

            foreach ($request->answers as $index => $answer) {
                $a = new Answer();
                $a->answer = $answer;
                $a->degree = $request->degrees[$index];
                $a->emoji = $request->emoji[$index];
                $a->question_id = $question->id;
                $a->save();
            }

            DB::commit();

            return redirect()->route('questions.index')->with(['success' => 'تم تديل السؤال بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('questions.index')->with(['error' => 'حدث خطا برجاء المحاوله مره اخرى']);
            DB::rollback();
        }
    }

    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return redirect()->route('questions.index')->with(['success' => 'تم حذف السؤال بنجاح']);
    }

    public function getCollections($id)
    {
        $collections = collection::where('test_id', $id)->pluck('name', 'id');
        return $collections;
    }
}
