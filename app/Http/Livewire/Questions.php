<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use App\Models\Pattern;

use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Questions extends Component
{

    public
        $questions = true,
        $inclinationsTest = false,
        $charactersTest = false,
        $skillsTest = false,
        $charactersQuestion = false,
        $inclinationsQuestion = false,
        $startSkillsQuestion = false,
        $charactersreport = false,
        $inclinationsreport = false,
        $startSkillsreport = false,
        $data,
        $counter = 0,
        $reportest = true,
        $pattes,
        $count,
        $pattern
    ;

    public function render()
    {
        $this->pattes = Pattern::get();
        return view('livewire.questions',[
            'questions',
            'inclinationsTest',
            'charactersTest',
            'skillsTest',
            'inclinationsreport',
            'charactersreport',
            'startSkillsreport',
            'pattes',
            'count',
            'pattern'
        ]);
    }

    public function startCharactersTest($pattern_id)
    {
        $this->charactersTest = true;
        $this->inclinationsTest = false;
        $this->skillsTest = false;
        $this->questions = false;
        $this->pattern = Pattern::find($pattern_id);


    }

    public function startInclinationsTest($pattern_id)
    {
        $this->inclinationsTest = true;
        $this->charactersTest = false;
        $this->skillsTest = false;
        $this->questions = false;
        $this->pattern = Pattern::find($pattern_id);


    }

    public function startSkillsTest($pattern_id)
    {
        $this->skillsTest = true;
        $this->charactersTest = false;
        $this->inclinationsTest = false;
        $this->questions = false;
        $this->pattern = Pattern::find($pattern_id);

    }

    public function startCharactersQuestion($pattern_id)
    {
        $this->charactersQuestion = true;
        $this->charactersTest = false;
        $this->skillsTest = false;
        $this->inclinationsTest = false;
        $this->questions = false;
        $this->data = Question::where('pattern_id',$pattern_id)->orderBy('id','asc')->get();
        $this->count= $this->data->count();

    }

    public function startInclinationsQuestion($pattern_id)
    {
        $this->inclinationsQuestion = true;
        $this->charactersTest = false;
        $this->skillsTest = false;
        $this->inclinationsTest = false;
        $this->questions = false;
        $this->data = Question::where('pattern_id',$pattern_id)->orderBy('id','asc')->get();
        $this->count= $this->data->count();


    }

    public function startSkillsQuestion($pattern_id)
    {
        $this->startSkillsQuestion = true;
        $this->charactersTest = false;
        $this->skillsTest = false;
        $this->inclinationsTest = false;
        $this->questions = false;
        $this->data = Question::where('pattern_id',$pattern_id)->orderBy('id','asc')->get();
        $this->count= $this->data->count();

    }

    public function nextQuestion($pattern,$test,$question,$answer)
    {
        $questi= Question::find($question);
        $questions= preg_split("/[,]/",$questi->collection_id);
        foreach($questions as $que){
            $degree = Answer::where('id', $answer)->select('degree')->get();
            $findAnswer = UserAnswer::where('user_id', Auth::user()->id)
            ->where('question_id', $questi->id)
            ->where('collection_id', (int)$que)
            ->get();
            if (count($findAnswer) != 0) {
                $x = UserAnswer::find($findAnswer[0]->id);
                $x->update([
                    'user_id' => Auth::user()->id,
                    'answer_id' => $answer,
                    'answer_degree' => $degree[0]->degree,
                ]);
            } else {
                $UserAnswer = new UserAnswer();
                $UserAnswer->user_id = Auth::user()->id;
                $UserAnswer->pattern_id = $pattern;
                $UserAnswer->test_id = $test;
                $UserAnswer->collection_id = (int)$que;
                $UserAnswer->question_id = $questi->id;
                $UserAnswer->answer_id = $answer;
                $UserAnswer->answer_degree = $degree[0]->degree;
                $UserAnswer->save();
            }
        }

        if( $this->counter ==  $this->data->count()-1){
            if( $this->inclinationsQuestion == true ){
                $this->inclinationsreport = true;
                $this->inclinationsQuestion = false;
            }elseif( $this->charactersQuestion  == true){
                $this->charactersreport = true;
                $this->charactersQuestion = false;
            }elseif( $this->startSkillsQuestion  == true){
                $this->startSkillsreport = true;
                $this->startSkillsQuestion = false;
            }
        }else{
            $this->counter ++;
        }
    }

    public function backQuestion()
    {
        $this->counter --;
    }

    public function report($patt)
    {
        return redirect()->to('/report-user/'.$patt);
    }

}
