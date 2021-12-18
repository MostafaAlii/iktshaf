<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserAnswer;
use App\Models\Collection;
use App\Models\Test;
use App\Models\Pattern;
class ReportController extends Controller
{
    public function report_user($pattern) {
        $test = Test::select('id')->where('pattern_id',$pattern)->get()->toArray();
        $tests = Test::select('id','test')->where('pattern_id',$pattern)->get();
        $Pattern = Pattern::find($pattern);
        $colects = Collection::with('answer')->whereIn('test_id',$test)->get();
        $colects_arr = Collection::select('id')->whereIn('test_id',$test)->get()->toArray();
        $answer =UserAnswer::where('user_id',\Auth::user()->id)->whereIn('collection_id',$colects_arr)->first();



        if($pattern == 1){
            return view('user.reports.one_report',['Pattern'=>$Pattern,'colects'=>$colects,'answer'=>$answer,'tests'=>$tests]);
        }elseif($pattern == 2){
            return view('user.reports.tow_report',['Pattern'=>$Pattern,'colects'=>$colects,'answer'=>$answer,'tests'=>$tests]);
        }elseif($pattern == 3){
            return view('user.reports.three_report',['Pattern'=>$Pattern,'colects'=>$colects,'answer'=>$answer,'tests'=>$tests]);
        }
    }
}
